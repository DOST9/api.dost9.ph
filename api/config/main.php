<?php

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),    
    'bootstrap' => ['log'],
    'modules' => [
        'sms' => [
            'basePath' => '@app/modules/sms',
            'class' => 'api\modules\sms\Module'
        ]
    ],
    'components' => [
        
        'apicomponent' => [
            'class' => 'api\components\ApiComponent',
        ],

        'response' => [
             'format' => yii\web\Response::FORMAT_JSON,
             'charset' => 'UTF-8',

            /*'on beforeSend' => function (yii\base\Event $event) {
                $response = $event->sender;
                if (404 === $response->statusCode && is_array($response->data)) {
                    $response->data['code'] = $response->data['status'];
                    $response->data['status'] = 'Error';
                    //unset($response->data['type']);
                }
            },

            'on beforeSend' => function ($event) {                
                $response = $event->sender;
                if($response->statusCode == 422)
                {
                    $details = $response->data;
                    if(isset($response->data["message"]) && is_string($response->data["message"])) $details = $response->data["message"];
                    if(isset($response->data["message"]) && is_array($response->data["message"])) $details = json_decode($response->data['message']);

                    $response->data = [
                        'message' => 'Please correct your data with correct values.',
                        'details' => $details
                    ];
                }
            }*/     
        ],
        
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'sms/message',
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ],
                /*[
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => ['sms/message'], 
                    'extraPatterns' => [
                        'GET verifyagency' => 'verifyagency'
                    ]
                ],*/

            ],        
        ]
    ],
    'params' => $params,
];

