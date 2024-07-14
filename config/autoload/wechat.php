<?php

return [

    'use_stable_access_token' => false,
    'http' => [
        'throw'  => true, // 状态码非 200、300 时是否抛出异常，默认为开启
        'timeout' => 5.0,
        'retry' => true, // 使用默认重试配置
    ],
    /*
     * 公众号
     */
    'official_account' => [
        'default' => [
            'app_id' => env('WECHAT_OFFICIAL_ACCOUNT_APPID', 'your-app-id'),         // AppID
            'secret' => env('WECHAT_OFFICIAL_ACCOUNT_SECRET', 'your-app-secret'),    // AppSecret
            'token' => env('WECHAT_OFFICIAL_ACCOUNT_TOKEN', 'your-token'),           // Token
            'aes_key' => env('WECHAT_OFFICIAL_ACCOUNT_AES_KEY', ''),                 // EncodingAESKey
        ]
    ],

    /*
     * 小程序
     */
    'mini_program' => [
        'default' => [
            'app_id'  => env('WECHAT_MINI_PROGRAM_APPID', ''),
            'secret'  => env('WECHAT_MINI_PROGRAM_SECRET', ''),
            'token'   => env('WECHAT_MINI_PROGRAM_TOKEN', ''),
            'aes_key' => env('WECHAT_MINI_PROGRAM_AES_KEY', ''),
        ],
    ],

    /*
     * 微信支付
     */
    'payment' => [
        'default' => [
            'sandbox'            => env('WECHAT_PAYMENT_SANDBOX', false),
            'app_id'             => env('WECHAT_PAYMENT_APPID', ''),
            'mch_id'             => env('WECHAT_PAYMENT_MCH_ID', 'your-mch-id'),
            'key'                => env('WECHAT_PAYMENT_KEY', 'key-for-signature'),
            'cert_path'          => env('WECHAT_PAYMENT_CERT_PATH', 'path/to/cert/apiclient_cert.pem'),    // XXX: 绝对路径！！！！
            'key_path'           => env('WECHAT_PAYMENT_KEY_PATH', 'path/to/cert/apiclient_key.pem'),      // XXX: 绝对路径！！！！
            'notify_url'         => 'http://example.com/payments/wechat-notify',                           // 默认支付结果通知地址
        ],
    ],
];
