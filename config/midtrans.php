<?php

return [
    'serverKey' => env('MIDTRANS_KEY_SERVER'),
    'clientKey' => env('MIDTRANS_KEY_CLIENT'),
    'isProduction' => env('MIDTRANS_IS_PRODUCTION'),
    'isSanitized' => env('MIDTRANS_IS_SANITIZED'),
    'is3ds ' => env('MIDTRANS_IS_3DS'),
];