<?php 
return [ 
    'client_id' => env('PAYPAL_CLIENT_ID','AXU3wIrTm_REF0GazKuMhFIr3c9iA1JWivHpRo1rmfvOn1Fw1ALmISdPlkPX7S8Z39xBwZ2axuJjQGVT'),
    'secret' => env('PAYPAL_SECRET','EGsw_WU12CvITs997KG7U0eviwWZw20LosMGwot7W8c1WTohQfSfRc9ld5SCJsm1cC9bosGn6dWvHKkZ'),
    'settings' => array(
        'mode' => env('PAYPAL_MODE','sandbox'),
        'http.ConnectionTimeOut' => 30,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'ERROR'
    ),
];
