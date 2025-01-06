<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;

class HomeController extends Controller
{
    public function __invoke()
    {
        $foods = Menu::where('status', 'available')
                    ->where('category', 'food')
                    ->get();
        $drinks = Menu::where('status', 'available')
                    ->where('category', 'drink')
                    ->get();
        $carts = [];
        $total = 0;

        if(auth()->user()) {
            $carts = Cart::instance(auth()->user()->email)->content();
            $total = Cart::priceTotal();
        }

        return view('user.home.index', [
            'foods' => $foods,
            'drinks' => $drinks,
            'carts' => $carts,
            'total' => $total,
        ]);
    }

}
