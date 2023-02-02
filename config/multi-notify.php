<?php

return [
    /*
    |------------------------------------
    | Default SMS and E-mail Drivers
    |------------------------------------
    |
    | This parameter selects the appropriate gateway from the options below.
    | You can switch driver using env variable.
    |
     */
    'sms_default_driver' => env('NOTIFY_SMS_DEFAULT_DRIVER', 'testSms'),
    'mail_default_driver' => env('NOTIFY_MAIL_DEFAULT_DRIVER', 'testMail'),

    /*
    |------------------------------------
    | Active Method Status
    |------------------------------------
    |
    | These values determine whether the methods are active or inactive,
    | as they represent a boolean value.
    | You can switch active or inactive method using env variable.
    |
     */
    'sms_active' => env('SMS_ACTIVE', true),
    'mail_active' => env('MAIL_ACTIVE', true),

    /*
    |------------------------------------
    | List of drivers
    |------------------------------------
    |
    |
     */
    'drivers' => [
        'sms' => [
            'kavenegar' => [
                'apiKey' => '',
                'from' => '',
            ]
        ],
        'mail' => [

        ],
    ],

    /*
    |------------------------------------
    | Class maps
    |------------------------------------
    |
    |
     */
    'map' => [
        'sms' => [
            'kavenegar' => \j3yzz\MultiNotify\Drivers\Kavenegar::class,
        ],
        'mail' => [

        ],
    ]
];
