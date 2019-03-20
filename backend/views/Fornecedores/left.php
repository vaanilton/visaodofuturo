<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

  <div class="col-md-3 left_col sidebar">
    <div class="left_col scroll-view ">
      <div class="navbar nav_title" style="border: 0;">
        <a href="<?= Url::to(['site/index']); ?>" class="site_title"><i class="fa fa-eye"></i> <span>Visao do Futuro </span></a>
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

            <li>
              <a>
                <i class="fa fa-dashboard"></i> Dashboard
                <span class="fa fa-chevron-down"></span>
              </a>
              <ul class="nav child_menu">
                <li><a class="" href="<?= Url::to(['site/index']); ?>">Dashboard Producao</a></li>
                <li><a class="" href="<?= Url::to(['site/dashboard']); ?>">Dashboard Fornecedor</a></li>
              </ul>
            </li>

            <li class="parent">
              <a data-toggle="collapse" >
                <i class="fa fa-user"></i> Utilizador <span class="fa fa-chevron-down"></span>
              </a>
              <ul class="nav child_menu" >
                <li><a class="" href="<?= Url::to(['user/index']); ?>">Utilizador</a></li>
                <li><a class="" href="<?= Url::to(['user/create']); ?>">Novo Utilizador</a></li>
                <li><a class="" href="<?= Url::to(['user/bloquiado']); ?>">Utilizador Bloquiado</a></li>
                <li><a class="" href="<?= Url::to(['estado/index']); ?>">Historico Utilizador</a></li>
              </ul>
            </li>

            <li><a><i class="fa fa-group"></i> Fornecedor <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><?= Html::a('Listar Fornecedor', ['fornecedor/index']) ?></li>
                <li><?= Html::a('Cadastrar Fornecedor', ['fornecedor/create']) ?></li>
                <li><?= Html::a('Listar Agricultor', ['fornecedor/listaragricultor']) ?></li>
                <li><?= Html::a('Listar Pastor', ['fornecedor/listarpastor']) ?></li>
              </ul>
            </li>

            <li><a><i class="fa fa-dollar"></i> Emprestimo <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><?= Html::a('Registrar Emprestimo', ['emprestimo/create']) ?></li>
                <li><?= Html::a('Listar Emprestimo', ['emprestimo/index']) ?></li>

              </ul>
            </li>
            <li><a><i class="fa fa-tree"></i> Cultivo <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><?= Html::a('Cultivo', ['cultivo/index']) ?></li>
                <li><?= Html::a('Novo', ['cultivo/create']) ?></li>
              </ul>
            </li>
            <li><a><i class="fa fa-qq"></i> Gado <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><?= Html::a('Gado', ['gado/index']) ?></li>
                <li><?= Html::a('Novo', ['gado/create']) ?></li>
              </ul>
            </li>
            <li><a><i class="fa fa-cubes"></i>Producao <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><?= Html::a('Producao', ['producao/index']) ?></li>
                <li><?= Html::a('Novo Producao Agricula', ['producao/producaoagricula']) ?></li>
                <li><?= Html::a('Novo Producao Pecuaria', ['producao/producaopecuria']) ?></li>
              </ul>
            </li>
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
            <li><a><i class="fa fa-shopping-cart"></i>Compra <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><?= Html::a('Compra', ['compra/index']) ?></li>

              </ul>
            </li>
          </ul>
        </div>

        <!-- Menus -->

        <div class="menu_section">
          <h3>Regiao</h3>
          <ul class="nav side-menu">
            <li><a><i class="fa fa-plus-square"></i> Regiao <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><?= Html::a('Registrar Regiao', ['regiao/create']) ?></li>
                <li><?= Html::a('Listar Regiao', ['regiao/index']) ?></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
