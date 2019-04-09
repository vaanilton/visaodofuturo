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

        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                <i class="fa fa-cogs"></i>
            </a>
            <ul class="dropdown-menu dropdown-alerts">
              <li>
                <a href="<?= Url::to(['site/backofice']); ?>">
                  <div><em class="fa fa-eye"></em>&nbsp;BackOffice</div>
                </a>
              </li>
            </ul>
          </li>

        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                <em class="fa fa-user"></em>
            </a>
            <ul class="dropdown-menu dropdown-alerts">
              <li>
                  <a href="<?= Url::to(['user/update','id'=>Yii::$app->user->identity->id]); ?>">
                      <div><em class="fa fa-eye"></em>&nbsp;Perfill</div>
                  </a>
              </li>
              <li class="divider"></li>
              <li>
                  <?= Html::a('<em class="fa fa-power-off"></em>&nbsp;Logout', ['site/logout'], ['data' => ['method' => 'post']]) ?>
              </li>
            </ul>
          </li>

          <li role="presentation" class="dropdown">
            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-envelope-square"></i>
              <span class="badge bg-green">6</span>
            </a>
            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
              <li>
                <a>
                  <span class="image"><img src="<?php $directoryAsset ?>images/img.jpg" alt="Profile Image" /></span>
                  <span>
                    <span>John Smith</span>
                    <span class="time">3 mins ago</span>
                  </span>
                  <span class="message">
                    Film festivals used to be do-or-die moments for movie makers. They were where...
                  </span>
                </a>
              </li>
              <li>
                <a>
                  <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                  <span>
                    <span>John Smith</span>
                    <span class="time">3 mins ago</span>
                  </span>
                  <span class="message">
                    Film festivals used to be do-or-die moments for movie makers. They were where...
                  </span>
                </a>
              </li>
              <li>
                <a>
                  <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                  <span>
                    <span>John Smith</span>
                    <span class="time">3 mins ago</span>
                  </span>
                  <span class="message">
                    Film festivals used to be do-or-die moments for movie makers. They were where...
                  </span>
                </a>
              </li>
              <li>
                <a>
                  <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                  <span>
                    <span>John Smith</span>
                    <span class="time">3 mins ago</span>
                  </span>
                  <span class="message">
                    Film festivals used to be do-or-die moments for movie makers. They were where...
                  </span>
                </a>
              </li>
              <li>
                <div class="text-center">
                  <a>
                    <strong>See All Alerts</strong>
                    <i class="fa fa-angle-right"></i>
                  </a>
                </div>
              </li>
            </ul>
          </li>
        </ul>

    </div>
  </div>
  <br>
  <br>
  <br>
