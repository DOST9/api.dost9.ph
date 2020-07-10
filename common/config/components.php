<?php

return [
    /*'mailer' => [
        'class' => 'yii\swiftmailer\Mailer',
        'viewPath' => '@common/mail',
        // send all mails to a file by default. You have to set
        // 'useFileTransport' to false and configure a transport
        // for the mailer to send real emails.
        'useFileTransport' => false,
    ],*/
    'mailer' => [
           'class' => 'yii\swiftmailer\Mailer',
           'viewPath' => '@common/mail',
            'useFileTransport' => false,//set this property to false to send mails to real email addresses
            //comment the following array to send mail using php's mail function
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'mailer.dost@gmail.com',
                'password' => 'DostRegion9',
                'port' => '587',
                'encryption' => 'tls',
                'streamOptions'=>[
                   'ssl'=>[
                        'verify_peer'=>false,
                        'verify_peer_name'=>false,
                        'allow_self_signed'=>true
                  ]
                ]
            ],
    ],
];