<?php
return [
    /**
     * 账号基本信息，请从微信公众平台/开放平台获取
     */
    'app_id'  => env('WECHAT_MINI_PROGRAM_APPID', ''),
    'secret'  => env('WECHAT_MINI_PROGRAM_SECRET', ''),
    'token'   => env('WECHAT_MINI_PROGRAM_TOKEN', ''),
    'aes_key' => env('WECHAT_MINI_PROGRAM_AES_KEY', 'EncodingAESKey'),

    /**
     * 是否使用 Stable Access Token
     * 默认 false
     * https://developers.weixin.qq.com/miniprogram/dev/OpenApiDoc/mp-access-token/getStableAccessToken.html
     * true 使用 false 不使用
     */
    'use_stable_access_token' => false,

    /**
     * 接口请求相关配置，超时时间等，具体可用参数请参考：
     * https://github.com/symfony/symfony/blob/5.3/src/Symfony/Contracts/HttpClient/HttpClientInterface.php
     */
    'http' => [
        'throw'  => true, // 状态码非 200、300 时是否抛出异常，默认为开启
        'timeout' => 5.0,
        // 'base_uri' => 'https://api.weixin.qq.com/', // 如果你在国外想要覆盖默认的 url 的时候才使用，根据不同的模块配置不同的 uri

        'retry' => true, // 使用默认重试配置
        //  'retry' => [
        //      // 仅以下状态码重试
        //      'status_codes' => [429, 500]
        //       // 最大重试次数
        //      'max_retries' => 3,
        //      // 请求间隔 (毫秒)
        //      'delay' => 1000,
        //      // 如果设置，每次重试的等待时间都会增加这个系数
        //      // (例如. 首次:1000ms; 第二次: 3 * 1000ms; etc.)
        //      'multiplier' => 3
        //  ],
    ],
];

//return [
//
//    'use_stable_access_token' => false,
//    'http' => [
//        'throw'  => true, // 状态码非 200、300 时是否抛出异常，默认为开启
//        'timeout' => 5.0,
//        'retry' => true, // 使用默认重试配置
//    ],
//    /*
//     * 公众号
//     */
//    'official_account' => [
//        'default' => [
//            'app_id' => env('WECHAT_OFFICIAL_ACCOUNT_APPID', 'your-app-id'),         // AppID
//            'secret' => env('WECHAT_OFFICIAL_ACCOUNT_SECRET', 'your-app-secret'),    // AppSecret
//            'token' => env('WECHAT_OFFICIAL_ACCOUNT_TOKEN', 'your-token'),           // Token
//            'aes_key' => env('WECHAT_OFFICIAL_ACCOUNT_AES_KEY', ''),                 // EncodingAESKey
//        ]
//    ],
//
//    /*
//     * 小程序
//     */
//    'mini_program' => [
//        'default' => [
//            'app_id'  => env('WECHAT_MINI_PROGRAM_APPID', ''),
//            'secret'  => env('WECHAT_MINI_PROGRAM_SECRET', ''),
//            'token'   => env('WECHAT_MINI_PROGRAM_TOKEN', ''),
//            'aes_key' => env('WECHAT_MINI_PROGRAM_AES_KEY', ''),
//            'response_type' => 'array',
//
//            'log' => [
//                'level' => 'debug',
//                'file' => __DIR__.'/wechat.log',
//            ],
//        ],
//    ],
//
//    /*
//     * 微信支付
//     */
//    'payment' => [
//        'default' => [
//            'sandbox'            => env('WECHAT_PAYMENT_SANDBOX', false),
//            'app_id'             => env('WECHAT_PAYMENT_APPID', ''),
//            'mch_id'             => env('WECHAT_PAYMENT_MCH_ID', 'your-mch-id'),
//            'key'                => env('WECHAT_PAYMENT_KEY', 'key-for-signature'),
//            'cert_path'          => env('WECHAT_PAYMENT_CERT_PATH', 'path/to/cert/apiclient_cert.pem'),    // XXX: 绝对路径！！！！
//            'key_path'           => env('WECHAT_PAYMENT_KEY_PATH', 'path/to/cert/apiclient_key.pem'),      // XXX: 绝对路径！！！！
//            'notify_url'         => 'http://example.com/payments/wechat-notify',                           // 默认支付结果通知地址
//        ],
//    ],
//];
