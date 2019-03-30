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

              //Caso for Administrador

              }else if($profile->tipo === 'Adiministrador'){ ?>
                  <div class="wrapper">
                    <div class="container body">
                      <div class="main_container">
                          <?= $this->render(
                            '../Adiministrador/header.php',
                            [
                              'directoryAsset' => $directoryAsset,
                              'profile'=>$profile
                            ]
                          )?>
                          <?= $this->render(
                            '../Adiministrador/left.php',
                            [
                              'directoryAsset' => $directoryAsset,
                              'profile'=>$profile
                            ]
                          )?>
                          <?= $this->render(
                            '../Adiministrador/content.php',
                            [
                              'content' => $content,
                              'directoryAsset' => $directoryAsset
                            ]
                          )?>
                        </div>
                      </div>
                    </div>

              <?php }else if($profile->tipo === 'Fiel_armazen'){ ?>

                <div class="wrapper">
                  <div class="container body">
                    <div class="main_container">
                      <?= $this->render(
                        '../Fielarmazem/header.php',
                        [
                          'directoryAsset' => $directoryAsset,
                          'profile'=>$profile
                        ]
                      )?>
                      <?= $this->render(
                        '../Fielarmazem/left.php',
                        [
                          'directoryAsset' => $directoryAsset,
                          'profile'=>$profile
                        ]
                      )?>
                      <?= $this->render(
                        '../Fielarmazem/content.php',
                        [
                          'content' => $content,
                          'directoryAsset' => $directoryAsset
                        ]
                      )?>

                    </div>
                  </div>
                </div>

              <?php }else if($profile->tipo === 'Fornecedores'){ ?>

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

              <?php }else if($profile->tipo === 'Gestor'){ ?>

                  <div class="wrapper">
                    <div class="container body">
                      <div class="main_container">
                        <?= $this->render(
                        '../Gestor/header.php',
                        [
                          'directoryAsset' => $directoryAsset,
                          'profile'=>$profile
                        ]
                        ) ?>
                        <?= $this->render(
                          '../Gestor/left.php',
                          [
                            'directoryAsset' => $directoryAsset,
                            'profile'=>$profile
                          ]
                        )
                        ?>
                        <?= $this->render(
                          '../Gestor/content.php',
                          ['content' => $content, 'directoryAsset' => $directoryAsset]
                        ) ?>
                      </div>
                    </div>
                  </div>

              <?php }else if($profile->tipo === 'backoffice'){ ?>

                  <div class="wrapper">
                    <div class="container body">
                      <div class="main_container">
                        <?= $this->render(
                        '../BackOffic/header.php',
                        [
                          'directoryAsset' => $directoryAsset,
                          'profile'=>$profile
                        ]
                        ) ?>
                        <?= $this->render(
                          '../BackOffic/left.php',
                          [
                            'directoryAsset' => $directoryAsset,
                            'profile'=>$profile
                          ]
                        )
                        ?>
                        <?= $this->render(
                          '../BackOffic/content.php',
                          ['content' => $content, 'directoryAsset' => $directoryAsset]
                        ) ?>
                      </div>
                    </div>
                  </div>

              <?php }else if($profile->tipo === 'Operador'){ ?>

                <div class="wrapper">
                  <div class="container body">
                    <div class="main_container">
                      <?= $this->render(
                      '../Operador/header.php',
                      [
                        'directoryAsset' => $directoryAsset,
                        'profile'=>$profile
                      ]
                      ) ?>
                      <?= $this->render(
                        '../Operador/left.php',
                        [
                          'directoryAsset' => $directoryAsset,
                          'profile'=>$profile
                        ]
                      )
                      ?>
                      <?= $this->render(
                        '../Operador/content.php',
                        ['content' => $content, 'directoryAsset' => $directoryAsset]
                      ) ?>
                    </div>
                  </div>
                </div>

              <?php }else if($profile->tipo === 'Agente-Venda'){ ?>

                  <div class="wrapper">
                    <div class="container body">
                      <div class="main_container">
                        <?= $this->render(
                        '../Agente-Venda/header.php',
                        [
                          'directoryAsset' => $directoryAsset,
                          'profile'=>$profile
                        ]
                        ) ?>
                        <?= $this->render(
                          '../Agente-Venda/left.php',
                          [
                            'directoryAsset' => $directoryAsset,
                            'profile'=>$profile
                          ]
                        )
                        ?>
                        <?= $this->render(
                          '../Agente-Venda/content.php',
                          ['content' => $content, 'directoryAsset' => $directoryAsset]
                        ) ?>
                      </div>
                    </div>
                  </div>

              <?php }else return Yii::$app->getResponse()->redirect(Url::to(['site/login']));
          } else return Yii::$app->getResponse()->redirect(Url::to(['site/login'])); ?>

          <?php $this->endBody() ?>
      </body>
    </html>
  <?php $this->endPage() ?>
