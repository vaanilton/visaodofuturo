<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

  <div class="col-md-3 left_col sidebar">
    <div class="left_col scroll-view">
      <div class="navbar nav_title" style="border: 0;">
        <a href="<?= Url::to(['fornecedor/create']); ?>" class="site_title">
          <img src="images/visao.png" alt="" width=50 height=45>
          <span>Visão Do Futuro </span>
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

          <h2 style="text-align: center;font-size: 18px;color: white;"><?= $profile->nome?></h2>
          <h2 style="text-align: center;font-size: 18px;color: white;"><?= $profile->sobrenome ?></h2>
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


            <li class="parent <?php if ($page=='site') { echo "active"; } ?>">
              <a>
                <i class="fa fa-dashboard"></i> Dashboard
                <span class="fa fa-chevron-down"></span>
              </a>
              <ul class="nav child_menu">
                <li><a class="" href="<?= Url::to(['site/index']); ?>">Dashboard</a></li>
              </ul>
            </li>

            <li class="parent <?php if ($page=='fornecedor') { echo "active"; } ?>">
              <a>
                <i class="fa fa-group"></i> Fornecedor <span class="fa fa-chevron-down"></span>
              </a>
              <ul class="nav child_menu">
                <li><?= Html::a('Fornecedor', ['fornecedor/index']) ?></li>
                <li><?= Html::a('Novo Fornecedor', ['fornecedor/create']) ?></li>
                <li><?= Html::a('Listar Agricultor', ['fornecedor/listaragricultor']) ?></li>
                <li><?= Html::a('Listar Pastor', ['fornecedor/listarpastor']) ?></li>
              </ul>
            </li>

            <li class="parent <?php if ($page=='emprestimo') { echo "active"; } ?>">
              <a><i class="fa fa-dollar"></i> Emprestimo <span class="fa fa-chevron-down"></span>
              </a>
              <ul class="nav child_menu">
                <li><?= Html::a('Emprestimos', ['emprestimo/index']) ?></li>
                <li><?= Html::a('Registrar', ['emprestimo/create']) ?></li>
              </ul>
            </li>

            <li class="parent <?php if ($page=='cultivo') { echo "active"; } ?>">
              <a>
                <i class="fa fa-tree"></i> Cultivo <span class="fa fa-chevron-down"></span>
              </a>
              <ul class="nav child_menu">
                <li><?= Html::a('Cultivos', ['cultivo/index']) ?></li>
                <li><?= Html::a('Novo', ['cultivo/create']) ?></li>
              </ul>
            </li>

            <li class="parent <?php if ($page=='gado') { echo "active"; } ?>">
              <a>
                <i class="fa fa-qq"></i> Gado <span class="fa fa-chevron-down"></span>
              </a>
              <ul class="nav child_menu">
                <li><?= Html::a('Gados', ['gado/index']) ?></li>
                <li><?= Html::a('Novo', ['gado/create']) ?></li>
              </ul>
            </li>

            <li class="parent <?php if ($page=='producao') { echo "active"; } ?>">
              <a>
                <i class="fa fa-cubes"></i>Producao <span class="fa fa-chevron-down"></span>
              </a>
              <ul class="nav child_menu">
                <li><?= Html::a('Produções', ['producao/index']) ?></li>
                <li><?= Html::a('Novo Producao Agricula', ['producao/producaoagricula']) ?></li>
                <li><?= Html::a('Novo Producao Pecuaria', ['producao/producaopecuria']) ?></li>
              </ul>
            </li>

            <li class="parent <?php if ($page=='produto') { echo "active"; } ?>">
              <a>
                <i class="fa fa-cube"></i>Produto <span class="fa fa-chevron-down"></span>
              </a>
              <ul class="nav child_menu">
                <li><?= Html::a('Produtos', ['produto/index']) ?></li>
              </ul>
            </li>

            <li class="parent <?php if ($page=='stock') { echo "active"; } ?>">
              <a><i class="fa fa-database"></i>Stock <span class="fa fa-chevron-down"></span>
              </a>
              <ul class="nav child_menu">
                <li><?= Html::a('Stocks', ['stock/index']) ?></li>
              </ul>
            </li>

            <li class="parent <?php if ($page=='compra') { echo "active"; } ?>">
              <a>
                <i class="fa fa-shopping-cart"></i>Compra <span class="fa fa-chevron-down"></span>
              </a>
              <ul class="nav child_menu">
                <li><?= Html::a('Compras', ['compra/index']) ?></li>

              </ul>
            </li>
          </ul>
        </div>

        <!-- Menus -->

        <div class="menu_section">
          <h3>Regiao</h3>
          <ul class="nav side-menu">
            <li class="parent <?php if ($page=='regiao') { echo "active"; } ?>">
              <a>
                <i class="fa fa-map-marker"></i> Regiao <span class="fa fa-chevron-down"></span>
              </a>
              <ul class="nav child_menu">
                <li><?= Html::a('Regiões', ['regiao/index']) ?></li>
                <li><?= Html::a('Maps', ['regiao/maps']) ?></li>
                <li><?= Html::a('Novo', ['regiao/create']) ?></li>
              </ul>
            </li>
          </ul>
        </div>
        <div class="menu_section">
          <h3>BackOffice</h3>
          <ul class="nav side-menu">
            <li class="parent <?php if ($page=='backoffice') { echo "active"; } ?>">
              <a href="<?= Url::to(['backoffice/index']); ?>">
                <i class="fa fa-bold"></i> BackOffice
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
