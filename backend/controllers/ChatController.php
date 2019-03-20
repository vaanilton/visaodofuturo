<?php

namespace app\controllers;

class ChatController extends \yii\web\Controller
{
  public function actionSendChat() {
//        $message = $_POST['message'];
      $message = \Yii::$app->request->post('message');
      if ($message) {
          $model = new Chat;
          $model -> message = $message;
          if ($model -> save()) {
              echo ChatRoom::data();
          } else {
              print_r($model -> getErrors());
              exit(0);
          }
      }
      return $this -> render('sendChat',[
        'model' => $message
      ]);
  }

}
