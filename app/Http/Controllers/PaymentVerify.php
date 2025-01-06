<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class PaymentVerify extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $order_id = $request->order_id;
        $transaction_status = $request->transaction_status;
        $status_code = $request->status_code;
        $gross_amount = $request->gross_amount;
        $signature_key = $request->signature_key;
        
        if(!$order_id || !$status_code || !$gross_amount || !$signature_key || !$transaction_status) {
            abort(404);
        }

        $signature = hash('SHA512', $order_id.$status_code.$gross_amount.config('midtrans.serverKey'));
        
        if($signature != $signature_key) {
            return response()->json(['message' => 'invalid signature'], 400);
        }

        $order = Order::find($order_id);

        if(!$order) {
            return response()->json(['message' => 'order not found'], 400);
        }
        
        if(strcmp($transaction_status, 'capture') || strcmp($transaction_status, 'settlement')) {
            $order->status = 'success'; 
        }
        else if(strcmp($transaction_status, 'deny') || 
           strcmp($transaction_status, 'cancel') || 
           strcmp($transaction_status, 'expire') ||
           strcmp($transaction_status, 'failure')) {
            $order->status = 'failed';
        }
        
        $order->save();

        return response()->json(['message' => 'success']);
    }
}
