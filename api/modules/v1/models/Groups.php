<?php

namespace api\modules\v1\models;

use Yii;
/**
 * This is the model class for table "groups".
 *
 * @property integer $id
 * @property string $name
 *
 * @property GroupsUsers[] $groupsUsers
 */
class Groups extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'groups';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }




    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['id' => 'user_id'])
            ->viaTable('group_users', ['group_id' => 'id']);
    }

}
