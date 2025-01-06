<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryAddress extends Model
{
    protected $table = 'delivery_address';

    protected $fillable = [
        'delivery_id',
        'kecamatan',
        'kelurahan',
        'detail',
    ];

    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }
}
