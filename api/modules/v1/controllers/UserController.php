<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;
use yii\web\ServerErrorHttpException;

class UserController extends ActiveController
{
    public $modelClass = 'api\modules\v1\models\Users';
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

    public function behaviors()
    {
        return [
            [
                'class' => \yii\filters\ContentNegotiator::className(),
                'only' => ['index', 'view'],
                'formats' => [
                    'application/json' => \yii\web\Response::FORMAT_JSON,
                ],
            ],
        ];
    }

//    public function actions()
//    {
//        $actions = parent::actions();
//        // 注销系统自带的实现方法
//        unset($actions['index'], $actions['update'], $actions['create'], $actions['delete'], $actions['view']);
//        return $actions;
//    }




}


