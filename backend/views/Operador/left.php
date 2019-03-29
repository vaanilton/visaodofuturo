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

          <h2 style="text-align: center;font-size: 18px;color: white;"><?= $profile->nome?></h2>
          <h2 style="text-align: center;font-size: 18px;color: white;"><?= $profile->sobrenome?></h2>
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
            <li class="parent <?php if ($page=='fornecedor') { echo "active"; } ?>">
              <a>
                <i class="fa fa-group"></i> Fornecedor <span class="fa fa-chevron-down"></span>
              </a>
              <ul class="nav child_menu">
                <li><?= Html::a('Listar Fornecedor', ['fornecedor/index']) ?></li>
                <li><?= Html::a('Cadastrar Fornecedor', ['fornecedor/create']) ?></li>
                <li><?= Html::a('Listar Agricultor', ['fornecedor/listaragricultor']) ?></li>
                <li><?= Html::a('Listar Pastor', ['fornecedor/listarpastor']) ?></li>
              </ul>
            </li>

            <li class="parent <?php if ($page=='cultivo') { echo "active"; } ?>">
              <a><i class="fa fa-tree"></i> Cultivo <span class="fa fa-chevron-down"></span>
              </a>
              <ul class="nav child_menu">
                <li><?= Html::a('Cultivo', ['cultivo/index']) ?></li>
                <li><?= Html::a('Novo', ['cultivo/create']) ?></li>
              </ul>
            </li>

            <li class="parent <?php if ($page=='gado') { echo "active"; } ?>">
              <a><i class="fa fa-qq"></i> Gado <span class="fa fa-chevron-down"></span>
              </a>
              <ul class="nav child_menu">
                <li><?= Html::a('Gado', ['gado/index']) ?></li>
                <li><?= Html::a('Novo', ['gado/create']) ?></li>
              </ul>
            </li>

            <li class="parent <?php if ($page=='codigo-producao' || $page=='producao') { echo "active"; } ?>">
              <a><i class="fa fa-cubes"></i>Producao <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><?= Html::a('Criar Codigo Producao', ['codigo-producao/create']) ?></li>
                <li><?= Html::a('Producao', ['producao/index']) ?></li>
                <li><?= Html::a('Novo Producao Agricula', ['producao/producaoagricula']) ?></li>
                <li><?= Html::a('Novo Producao Pecuaria', ['producao/producaopecuria']) ?></li>
              </ul>
            </li>
          </ul>
        </div>

        <!-- Menus -->

        <div class="menu_section">
          <h3>Regiao</h3>
          <ul class="nav side-menu">
            <li class="parent <?php if ($page=='regiao') { echo "active"; } ?>">
              <a href="<?= Url::to(['regiao/index']); ?>">
                <i class="fa fa-plus-square"></i> Regiao <span class="fa fa-chevron-down"></span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
