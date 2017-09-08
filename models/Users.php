<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "my_users".
 *
 * @property integer $id
 * @property string $username
 * @property string $last_name
 * @property string $password
 * @property integer $auth_key
 * @property integer $access_token
 * @property string $adminGroup
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'my_users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'last_name', 'password'], 'required'],
            [['auth_key', 'access_token'], 'integer'],
            [['adminGroup'], 'string'],
            [['username', 'last_name', 'password'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'last_name' => 'Last Name',
            'password' => 'Password',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
            'adminGroup' => 'Admin Group',
        ];
    }
}
