<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_info".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $sname
 *
 * @property Userss $user
 */
class Userinfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'name', 'sname'], 'required'],
            [['user_id'], 'integer'],
            [['name', 'sname'], 'string', 'max' => 100],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Userss::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'name' => 'Name',
            'sname' => 'Sname',

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Userss::className(), ['id' => 'user_id']);
    }
    public function getEmail()
    {
        return $this->user->email;
    }
}
