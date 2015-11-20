<?php

namespace backend\models;

use Yii;
use yii\web\IdentityInterface;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "admin_user".
 *
 * @property string $id
 * @property string $uname
 * @property string $password
 * @property string $auth_key
 * @property string $last_ip
 * @property string $is_online
 * @property string $domain_account
 * @property integer $status
 * @property string $create_user
 * @property string $create_date
 * @property string $update_user
 * @property string $update_date
 */
class AdminUser extends BackendUser
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uname', 'password', 'create_user', 'create_date', 'update_user', 'update_date'], 'required'],
            [['status'], 'integer'],
            [['create_date', 'update_date'], 'safe'],
            [['uname', 'domain_account', 'create_user'], 'string', 'max' => 100],
            [['password', 'auth_key', 'last_ip'], 'string', 'max' => 50],
            [['is_online'], 'string', 'max' => 1],
            [['update_user'], 'string', 'max' => 101]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uname' => 'Uname',
            'password' => 'Password',
            'auth_key' => 'Auth Key',
            'last_ip' => 'Last Ip',
            'is_online' => 'Is Online',
            'domain_account' => 'Domain Account',
            'status' => 'Status',
            'create_user' => 'Create User',
            'create_date' => 'Create Date',
            'update_user' => 'Update User',
            'update_date' => 'Update Date',
        ];
    }
    
  
}
