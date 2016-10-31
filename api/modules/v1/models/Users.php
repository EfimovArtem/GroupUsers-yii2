<?php

namespace api\modules\v1\models;

use Yii;
use yii2tech\ar\linkmany\LinkManyBehavior;


/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $email
 * @property string $first_name
 * @property string $last_name
 * @property string $status
 * @property string $create_date
 *
 * @property GroupsUsers[] $groupsUsers
 */
class Users extends \yii\db\ActiveRecord
{


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'status'], 'required'],
            [['status'], 'integer'],
            [['create_date'], 'safe'],
            [['email'], 'email'],
            [['email'], 'unique'],
            [['first_name', 'last_name'], 'string', 'max' => 35],
            [['groupIds'], 'safe'],
        ];
    }


    public function behaviors()
    {
        return [
            'linkGroupBehavior' => [
                'class' => LinkManyBehavior::className(),
                'relation' => 'groups', // relation, which will be handled
                'relationReferenceAttribute' => 'groupIds', // virtual attribute, which is used for related records specification
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'status' => 'Status',
            'create_date' => 'Create Date',
        ];
    }


    public function getGroups()
    {
        return $this->hasMany(Groups::className(), ['id' => 'group_id'])
            ->viaTable('group_users', ['user_id' => 'id']);
    }

}
