<?php

return [

    'enable' => true,
    //阿里云
    'aliyun'       => [
        'version'       => '2017-05-25',
        'host'          => 'dysmsapi.aliyuncs.com',
        'scheme'        => 'http',
        'region_id'     => 'cn-hangzhou',
        'access_key'    => 'XXXXXXXXXXXXXXXXX',
        'access_secret' => 'XXXXXXXXXXXXXXXXXXXXXXXXXX',
        'sign_name'     => '闻宝满短信',
        'actions'       => [

            //验证码${code}，您正在注册成为新用户，感谢您的支持！
            'register'        => [
                'actions_name'      => '用户注册验证码',
                'template_id'  => 'SMS_147595177',
            ],

            //验证码${code}，您正在登录，若非本人操作，请勿泄露。
            'login'           => [
                'actions_name'      => '登录确认验证码',
                'template_id'  => 'SMS_147595179',
            ],

            //验证码${code}，您正在尝试修改登录密码，请妥善保管账户信息。
            'changePassword' => [
                'actions_name'      => '修改密码验证码',
                'template_id'  => 'SMS_147595176',
            ],

            //验证码${code}，您正在尝试变更重要信息，请妥善保管账户信息。
            'changeUserinfo' => [
                'actions_name'      => '信息变更验证码',
                'template_id'  => 'SMS_147595175',
            ],

            //您的验证码：${code}，在5分钟内有效，请勿泄漏。祝您生活愉快。
            'yanzhengma' => [
                'actions_name'      => '获取验证码',
                'template_id'  => 'SMS_147436405',
            ],

            //亲爱的${realname}：恭喜您，您已成功报名: ${active}活动，祝您生活愉快。
            'baomingok' => [
                'actions_name'      => '报名成功通知',
                'template_id'  => 'SMS_147416688',
            ],

            //恭喜您，您有新的客户报名。姓名：${realname}，请及时处理。
            'baomingkehu' => [
                'actions_name'      => '客户报名通知',
                'template_id'  => 'SMS_147416682',
            ],

        ],
    ],

    //腾讯云   在短信,应用列表中获取appid https://console.cloud.tencent.com/smsv2/app-manage/detail/1400672174
    'qcloud'       => [
        'appid'   =>  '1400600000',//一串数字
        'appkey'  =>  'XXXXXXXXXXXXXXXXXXXXXXXXXXXXX',
        'sign_name'       => '闻宝满短信',//
        'actions'       => [

            //验证码${code}，您正在注册成为新用户，感谢您的支持！
            'register'        => [
                'actions_name'      => '用户注册验证码',
                'template_id'  => '1390355',
            ],

            //验证码${code}，您正在登录，若非本人操作，请勿泄露。
            'login'           => [
                'actions_name'      => '登录确认验证码',
                'template_id'  => '1390354',
            ],

            //验证码${code}，您正在尝试修改登录密码，请妥善保管账户信息。
            'changePassword' => [
                'actions_name'      => '修改密码验证码',
                'template_id'  => '1390357',
            ],

            //验证码${code}，您正在尝试变更重要信息，请妥善保管账户信息。
            'changeUserinfo' => [
                'actions_name'      => '信息变更验证码',
                'template_id'  => '1390358',
            ],

            //您的验证码：${code}，在5分钟内有效，请勿泄漏。祝您生活愉快。
            'yanzhengma' => [
                'actions_name'      => '获取验证码',
                'template_id'  => '1390346',
            ],

            //亲爱的${realname}：恭喜您，您已成功报名: ${active}活动，祝您生活愉快。
            'baomingok' => [
                'actions_name'      => '报名成功通知',//未审核通过
                'template_id'  => '1390350',
            ],

            //恭喜您，您有新的客户报名。姓名：${realname}，请及时处理。
            'baomingkehu' => [
                'actions_name'      => '客户报名通知',
                'template_id'  => '1390351',
            ],

        ],
    ],



    'qiniu'       => [
        'AccessKey'   =>  'XXXXXXXXXXXXXXXXXXXXXXXXXXX',
        'SecretKey'  =>  'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',
        'actions'       => [
            'register'        => [
                'actions_name'      => '注册验证',
                'template_id'  => '1246849772845797376',
            ],
            'login'           => [
                'actions_name'      => '登录验证',
                'template_id'  => '1246849654881001472',
            ],
            'changePassword' => [
                'actions_name'      => '修改密码',
                'template_id'  => '1246849964902977536',
            ],
            'changeUserinfo' => [
                'actions_name'      => '变更信息',
                'template_id'  => '1246849860733243392',
            ],
        ],
    ],

    //https://support.huaweicloud.com/api-msgsms/sms_05_0001.html
    'huawei'       => [
        'url'  =>  'https://smsapi.cn-north-4.myhuaweicloud.com:443',
        'appKey'   =>  'XXXXXXXXXXXXXXXXXXXXXXXXX',
        'appSecret'  =>  'XXXXXXXXXXXXXXXXXXXXXXXXXXX',
        'sender'  =>  '106930000000000000000',//通道号
        'signature'  =>  '华为云短信测试',
        'statusCallback'  =>  '',
        'actions'       => [
            'register'        => [
                'actions_name'      => '短信测试',
                'template_id'  => 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',
            ],
            'login'           => [
                'actions_name'      => '登录验证',
                'template_id'  => 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',
            ],
            'changePassword' => [
                'actions_name'      => '修改密码',
                'template_id'  => 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',
            ],
            'changeUserinfo' => [
                'actions_name'      => '变更信息',
                'template_id'  => 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',
            ],
        ],
    ]
];