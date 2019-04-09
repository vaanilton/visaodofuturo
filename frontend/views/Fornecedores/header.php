<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string
<div class="top_nav navbar-fixed-top">
*/
?>

  <div class="top_nav navbar-fixed-top">
    <div class="nav_menu" style="background-color: #D9EDF6;">

        <div class="nav toggle">
          <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <?php
        if (!Yii::$app->user->isGuest) {
        ?>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <?= Html::a('<em class="fa fa-power-off"></em>&nbsp;', ['site/logout'], ['data' => ['method' => 'post']]) ?>
          </li>
        <?php
        }
        ?>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="<?= Url::to(['user/update','id'=>Yii::$app->user->identity->id]); ?>">
                <em class="fa fa-user"></em>
            </a>
          </li>

        </ul>

    </div>
  </div>
  <br>
  <br>
  <br>
