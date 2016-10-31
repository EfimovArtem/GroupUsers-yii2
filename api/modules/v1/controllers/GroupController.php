<?php

namespace api\modules\v1\controllers;

use api\modules\v1\models\GroupUsers;
use api\modules\v1\models\Users;
use Codeception\Lib\Generator\Group;
use Yii;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;
use yii\web\ServerErrorHttpException;

class GroupController extends ActiveController
{
    public $modelClass = 'api\modules\v1\models\Groups';
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


    public function actionUser($id)
    {
        $group = $this->findModel($id);
        $users = $group->users;
        return $users;
    }


    public function actionDeleteUser($id, $user_id)
    {
        $groupUsers = new GroupUsers();
        $groupUsers::find()->where(['group_id' => $id, 'user_id' => $user_id])->one();
        if (is_null($groupUsers)) {
            throw new NotFoundHttpException('The requested page does not exist.');
        } else {
            $groupUsers->delete();
        }
    }

    protected function findModel($id)
    {
        $modelClass = $this->modelClass;
        if (($model = $modelClass::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}

