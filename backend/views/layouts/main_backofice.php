<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AdminAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use backend\models\profile;
use yii\helpers\Url;

    $layout = Yii::$app->controller->id;

    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@backend/web');

    if (class_exists('AdminAsset')) {
        AdminAsset::register($this);
    } else {
        AdminAsset::register($this);
    }

    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
      <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
      </head>

      <body class="nav-md">
        <?php $this->beginBody() ?>

        <?php
          if(!Yii::$app->user->isGuest){

              $profile = Profile::find()->where(['user_iduser' => Yii::$app->user->identity->id])->one();
              if(!$profile){

                  return Yii::$app->response->redirect(Url::to(['site/login']));

                //Caso for Fiel_armazen
              }else{
        ?>
                <div class="wrapper">
                  <div class="container body">
                    <div class="main_container">
                      <?= $this->render(
                        '../Backoffice/header.php',
                        [
                          'directoryAsset' => $directoryAsset,
                          'profile'=>$profile
                        ]
                      )?>
                      <?= $this->render(
                        '../Backoffice/left.php',
                        [
                          'directoryAsset' => $directoryAsset,
                          'profile'=>$profile
                        ]
                      )?>
                      <?= $this->render(
                        '../Backoffice/content.php',
                        [
                          'content' => $content,
                          'directoryAsset' => $directoryAsset
                        ]
                      )?>

                    </div>
                  </div>
                </div>
              <?php
              //Caso for Fornecedores[Agricultor Pastor]
              }

          } else return Yii::$app->getResponse()->redirect(Url::to(['site/login']));
          ?>
          <?php $this->endBody() ?>
      </body>
    </html>
  <?php $this->endPage() ?>
