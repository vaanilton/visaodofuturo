<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use yii\web\uploadedFile;


/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $password_confirm;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            [['password','password_confirm'], 'string', 'min' => 6],
            [['password_confirm'], 'compare', 'compareAttribute'=>'password', 'message'=>'Password do not match'],

        ];
    }

    public function attributeLabels()
    {
        return [
            'password'=> 'Palavra Passe',
            'password_confirm'=> 'Confirmar Palavra Passe',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
     public function signup()
     {
        if ($this->validate()) {
            $user = new User();

            $user->username = $this->username;
            $user->email = $this->email;

            $user->setPassword($this->password);
            $user->generateAuthKey();

            $user->save(false);

            return $user;
        }

        return null;
     }

}
