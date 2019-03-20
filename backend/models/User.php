<?php

namespace backend\models;

use Yii;
use kartik\password\StrengthValidator;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $password;
    public $password_confirm;
    public $currentPassword;

    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['currentPassword','username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],

            ['password', 'string', 'min' => 6],
            ['password_confirm', 'string', 'min' => 6],
            ['password_confirm', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords nao Combinao" ],
            [['currentPassword'], 'validateCurrentPassword'],
        ];
    }

    public function validateCurrentPassword(){
      if(!$this->verifyPassword($this->currentPassword)){
        $this->addError("currentPassword", "Atual Password Incoreta");
      }
    }

    public function verifyPassword($password){
      $dbpassword = static::findOne(['username'=> Yii::$app->user->identity->username])->password_hash;
      return Yii::$app->security->validatePassword($password, $dbpassword);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'password' => 'Novo Password',
            'password_confirm' => 'Confirmar Password',
            'currentPassword' => 'Password Atual',
        ];
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
}
