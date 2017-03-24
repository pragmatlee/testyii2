<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "userss".
 *
 * @property integer $id
 * @property string $email
 *
 * @property UserInfo[] $userInfos
 */
class Userss extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'userss';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'email'], 'required'],
            [['id'], 'integer'],
            [['email'], 'string', 'max' => 25],
            [['email'], 'unique'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserInfos()
    {
        return $this->hasMany(UserInfo::className(), ['user_id' => 'id']);
    }
}
