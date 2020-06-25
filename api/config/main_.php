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
        'v1' => [
            'basePath' => '@app/modules/v1',
            'class' => 'api\modules\v1\Module'
        ]
    ],
    'components' => [
        
        'apicomponent' => [
            'class' => 'api\components\ApiComponent',
        ],

        'response' => [
             'format' => yii\web\Response::FORMAT_JSON,
             'charset' => 'UTF-8',
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
                    'controller' => ['v1/agency'],
                    'extraPatterns' => [
                        'GET search' => 'search'
                    ]
                ], 
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => ['v1/agency'],
                    'extraPatterns' => [
                        'GET testsoffered' => 'testsoffered'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'v1/agency',
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'v1/agencylab',
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'v1/analysis',
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'v1/businessnature',
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => ['v1/collection'],
                    'extraPatterns' => [
                        'GET search' => 'search'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'v1/collection',
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'v1/collectiontype',
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'v1/consolidatedreferral',
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]          
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => ['v1/customer'],
                    'extraPatterns' => [
                        'GET search' => 'search'
                    ]
                ],                
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'v1/customer',
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                    
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'v1/customertype',
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                    
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'v1/discount',
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                    
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'v1/industrytype',
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                    
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'v1/lab',
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => ['v1/labsampletype'],
                    'extraPatterns' => [
                        'GET search' => 'search'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'v1/labsampletype',
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => ['v1/labservice'],
                    'extraPatterns' => [
                        'GET search' => 'search'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'v1/labservice',
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => ['v1/methodreference'], 
                    'extraPatterns' => [
                        'GET search' => 'search'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'v1/methodreference',
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ],
		[
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => ['v1/notification'], 
                    'extraPatterns' => [
                        'GET markread' => 'markread'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => ['v1/notification'], 
                    'extraPatterns' => [
                        'GET search' => 'search'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'v1/notification',
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => ['v1/orderofpayment'], 
                    'extraPatterns' => [
                        'GET search' => 'search'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'v1/orderofpayment',
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => ['v1/paymentitem'], 
                    'extraPatterns' => [
                        'GET search' => 'search'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'v1/paymentitem',
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => ['v1/receipt'],
                    'extraPatterns' => [
                        'GET search' => 'search'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'v1/receipt',
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => ['v1/referralsampleanalysis'],
                    'extraPatterns' => [
                        'GET search' => 'search'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'v1/referralsampleanalysis',
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'v1/referralstatus',
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => ['v1/referral'], 
                    'extraPatterns' => [
                        'GET agency' => 'agency'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => ['v1/referral'], 
                    'extraPatterns' => [
                        'GET updatestatus' => 'updatestatus'
                    ]
                ],
		[
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => ['v1/referral'], 
                    'extraPatterns' => [
                        'GET validate' => 'validate'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => ['v1/referral'], 
                    'extraPatterns' => [
                        'GET search' => 'search'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'v1/referral',
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => ['v1/result'], 
                    'extraPatterns' => [
                        'GET download' => 'download'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'v1/result',
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => ['v1/sample'], 
                    'extraPatterns' => [
                        'GET search' => 'search'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'v1/sample',
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                    
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => ['v1/sampletypetestname'], 
                    'extraPatterns' => [
                        'GET search' => 'search'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'v1/sampletypetestname',
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                    
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => ['v1/service'], 
                    'extraPatterns' => [
                        'GET search' => 'search'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'v1/service',
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                    
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'v1/template',
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                    
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => ['v1/testname'],
                    'extraPatterns' => [
                        'GET offeredby' => 'offeredby'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => ['v1/testname'], 
                    'extraPatterns' => [
                        'GET search' => 'search'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'v1/testname',
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                    
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => ['v1/testnamemethod'], 
                    'extraPatterns' => [
                        'GET search' => 'search'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'v1/testnamemethod',
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => ['v1/user'], 
                    'extraPatterns' => [
                        'GET accesstoken' => 'accesstoken'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => ['v1/user'], 
                    'extraPatterns' => [
                        'GET validatetoken' => 'validatetoken'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => ['v1/user'], 
                    'extraPatterns' => [
                        'GET verifyagency' => 'verifyagency'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => ['v1/region'], 
                    'extraPatterns' => [
                        'GET search' => 'search'
                    ]
                ],
		[
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => ['v1/province'], 
                    'extraPatterns' => [
                        'GET search' => 'search'
                    ]
                ],
		[
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => ['v1/municipalitycity'], 
                    'extraPatterns' => [
                        'GET search' => 'search'
                    ]
                ],
		[
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => ['v1/barangay'], 
                    'extraPatterns' => [
                        'GET search' => 'search'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'v1/user',
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'v1/region',
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'v1/province',
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'v1/municipalitycity',
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'v1/barangay',
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ],
            ],        
        ]
    ],
    'params' => $params,
];

