<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

  <div class="col-md-3 left_col sidebar">
    <div class="left_col scroll-view ">
      <div class="navbar nav_title" style="border: 0;">
        <a href="<?= Url::to(['fornecedor/create']); ?>" class="site_title">
          <img src="images/visao.png" alt="" width=50 height=45>
          <span>Visao do Futuro </span>
        </a>
      </div>

      <div class="clearfix"></div>

      <!-- menu profile quick info -->
      <div class="profile clearfix">
        <div class="profile_pic">

          <?php
          $page = Yii::$app->controller->id;
          if(file_exists($profile->photo)) {
          ?>
            <a href="<?= Url::to(['user/update','id'=>$profile['user_iduser']]); ?>" class="image-popup" title="">
                <img style="margin-right: 50px !important; width: 60px;" src="<?= $profile['photo']; ?>" alt="" class="img-circle profile_img">
            </a>
          <?php
          } else {
          ?>
              <img style="margin-right: 50px !important; width: 60px;" src="../../img/user/utilizador.jpg" class="img-circle profile_img" alt=""/>
          <?php
          }
          ?>

        </div>

        <div class="profile-usertitle" >
          <br>
          <h2 style="text-align: center;font-size: 18px;color: white;"><?= $profile->nome.' '.$profile->sobrenome ?></h2>
          <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>


      </div>
      <!-- /menu profile quick info -->
      <br />
      <form role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Procurar">
        </div>
      </form>
      <br />

      <!-- sidebar menu -->
      <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
          <h3>General</h3>
          <ul class="nav side-menu">

            <li><a><i class="fa fa-cube"></i>Produto <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><?= Html::a('Produto', ['produto/index']) ?></li>
              </ul>
            </li>
            <li><a><i class="fa fa-database"></i>Stock <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><?= Html::a('Stock', ['stock/index']) ?></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
