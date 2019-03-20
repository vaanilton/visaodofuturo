<?php

  /* @var $this \yii\web\View */
  /* @var $content string */

  use frontend\assets\fornecedorAsset;
  use yii\helpers\Html;
  use yii\bootstrap\Nav;
  use yii\bootstrap\NavBar;
  use yii\widgets\Breadcrumbs;
  use common\widgets\Alert;
  use frontend\models\profile;
  use frontend\models\Fornecedor;
  use yii\helpers\Url;

  fornecedorAsset::register($this);
  $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@backend/web');
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
            $profile = Fornecedor::find()->where(['user_iduser' => Yii::$app->user->identity->id])->one();
            if(!$profile){
              Yii::$app->user->logout();
              return Yii::$app->response->redirect(Url::to(['site/index']));
            }else if($profile->tipo == 'Agricultor-Pastor'){
            ?>
              <div class="wrapper">
                <div class="container body">
                  <div class="main_container">
                    <?= $this->render(
                      '../Fornecedores/header.php',
                      [
                        'directoryAsset' => $directoryAsset,
                        'profile'=>$profile
                      ]
                    )?>
                    <?= $this->render(
                      '../Fornecedores/left.php',
                      [
                        'directoryAsset' => $directoryAsset,
                        'profile'=>$profile
                      ]
                    )?>
                    <?= $this->render(
                      '../Fornecedores/content.php',
                      [
                        'content' => $content,
                        'directoryAsset' => $directoryAsset
                      ]
                    )?>
                  </div>
                </div>
              </div>
            <?php
          }else if($profile->tipo == 'Pastor'){
          ?>
            <div class="wrapper">
              <div class="container body">
                <div class="main_container">
                  <?= $this->render(
                    '../Fornecedores/header.php',
                    [
                      'directoryAsset' => $directoryAsset,
                      'profile'=>$profile
                    ]
                  )?>
                  <?= $this->render(
                    '../Fornecedores/left.php',
                    [
                      'directoryAsset' => $directoryAsset,
                      'profile'=>$profile
                    ]
                  )?>
                  <?= $this->render(
                    '../Fornecedores/content.php',
                    [
                      'content' => $content,
                      'directoryAsset' => $directoryAsset
                    ]
                  )?>
                </div>
              </div>
            </div>
          <?php
          }else {
              Yii::$app->user->logout();
              return Yii::$app->response->redirect(Url::to(['site/index']));
          }
        } else return Yii::$app->getResponse()->redirect(Url::to(['site/index']));
        ?>

      <?php $this->endBody() ?>
    </body>
  </html>
  <?php $this->endPage() ?>
