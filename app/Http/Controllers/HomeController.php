<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;

class HomeController extends Controller
{
    public function index()
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
