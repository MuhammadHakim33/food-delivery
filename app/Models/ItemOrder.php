<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemOrder extends Model
{
    protected $table = 'item_order';

    protected $fillable = [
        'order_id',
        'menu_id',
        'qty',
        'price',
        'created_at',
        'updated_at',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
