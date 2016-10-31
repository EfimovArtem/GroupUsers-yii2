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
        'response' => [
            'format' => yii\web\Response::FORMAT_JSON,
            'charset' => 'UTF-8',
        ],

        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
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
            'enableStrictParsing' => false,
            'showScriptName' => false,
            'rules' => [

                    'POST <module>/users/<id>/modify' => '<module>/user/update',
                    'PUT <module>/users/<id>' => '<module>/user/update',
                    'DELETE <module>/users/<id>' => '<module>/user/delete',
                    'GET,HEAD <module>/users/<id>' => '<module>/user/view',
                    'POST <module>/users' => '<module>/user/create',
                    'GET,HEAD <module>/users' => '<module>/user/index',

                    'POST <module>/groups/<id>/modify' => '<module>/group/update',
                    'PUT <module>/groups/<id>' => '<module>/group/update',
                    'DELETE <module>/groups/<id>' => '<module>/group/delete',
                    'GET,HEAD <module>/groups/<id>' => '<module>/group/view',
                    'POST <module>/groups' => '<module>/group/create',
                    'GET,HEAD <module>/groups' => '<module>/group/index',

                    'GET <module>/groups/<id>/users' => '<module>/group/user',
                    'DELETE <module>/groups/<id>/users/<userID>' => '<module>/group/delete-user',



            ],
        ]
    ],
    'params' => $params,
];



