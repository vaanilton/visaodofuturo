<?php

namespace backend\modules\api\controllers;
use backend\modules\api\models\User;

class UserController extends \yii\web\Controller{

  public $enableCsrfValidation = false;

    public function actionIndex(){

        return $this->render('index');
    }

    public function actionCreateUser(){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $user = new User();
        $user->scenario = User::SCENARIO_CREATE;
        $user->attributes = \Yii::$app->request->post();

        if($user->validate()){
          $user->save();
          return array('status'=>true, 'data'=>'User criado');
        }else {
          return array('status'=>false, 'data'=>$user->getErrors());
        }
    }

    public function actionListUser(){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $user = User::find()->all();
        if(count($user)>0){
          return array('status'=>true, 'data'=>$user);
        }else {
          return array('status'=>false, 'data'=>'Nao Existe User');
        }
    }

}
