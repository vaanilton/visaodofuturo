<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

  <div class="col-md-3 left_col sidebar">
    <div class="left_col scroll-view ">
      
      <div class="navbar nav_title" style="border: 0;">
        <a href="<?= Url::to(['fornecedor/create']); ?>" class="site_title">
          <img src="images/visao.png" alt="" width=50 height=45>
          <span>Back - Office</span>
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

            <li class="parent <?php if ($page=='visao-presedente') { echo "active"; } ?>">
              <a>
                <i class="fa fa-eye"></i> Visao do Presedente
                <span class="fa fa-chevron-down"></span>
              </a>
              <ul class="nav child_menu">
                <li><a class="" href="<?= Url::to(['visao-presedente/index']); ?>">Visao do Presedente</a></li>
                <li><a class="" href="<?= Url::to(['visao-presedente/create']); ?>">Novo</a></li>
              </ul>
            </li>

            <li class="parent <?php if ($page=='area-intervencao') { echo "active"; } ?>">
              <a>
                <i class="fa fa-institution "></i> Area de Intervenção
                <span class="fa fa-chevron-down"></span>
              </a>
              <ul class="nav child_menu">
                <li><a class="" href="<?= Url::to(['area-intervencao/index']); ?>">Areas de Intervenções</a></li>
                <li><a class="" href="<?= Url::to(['area-intervencao/create']); ?>">Novo</a></li>
              </ul>
            </li>

            <li class="parent <?php if ($page=='equipa') { echo "active"; } ?>">
              <a data-toggle="collapse" >
                <i class="fa fa-group"></i> Equipa de Gestao
                <span class="fa fa-chevron-down"></span>
              </a>
              <ul class="nav child_menu" >
                <li><a class="" href="<?= Url::to(['equipa/index']); ?>">Equipa</a></li>
                <li><a class="" href="<?= Url::to(['equipa/create']); ?>">Novo</a></li>
              </ul>
            </li>

            <li class="parent <?php if ($page=='galeria') { echo "active"; } ?>">
              <a>
                <i class="fa fa-photo"></i> Galeria Slide
                <span class="fa fa-chevron-down"></span>
              </a>
              <ul class="nav child_menu">
                <li><a class="" href="<?= Url::to(['galeria/index']); ?>">Galeria</a></li>
                <li><a class="" href="<?= Url::to(['galeria/create']); ?>">Novo</a></li>
              </ul>
            </li>

            <li class="parent <?php if ($page=='area-especialisacao') { echo "active"; } ?>">
              <a>
                <i class="fa fa-square"></i> Áreas Especialisação
                <span class="fa fa-chevron-down"></span>
              </a>
              <ul class="nav child_menu">
                <li><a class="" href="<?= Url::to(['area-especialisacao/index']); ?>">Áreas de Especialisação</a></li>
                <li><a class="" href="<?= Url::to(['area-especialisacao/create']); ?>">Novo</a></li>
              </ul>
            </li>

            <li class="parent <?php if ($page=='intervensao-social') { echo "active"; } ?>">
              <a>
                <i class="fa fa-fast-forward"></i> Intervenção Social
                <span class="fa fa-chevron-down"></span>
              </a>
              <ul class="nav child_menu">
                <li><a class="" href="<?= Url::to(['intervensao-social/index']); ?>">Intervenção Social</a></li>
                <li><a class="" href="<?= Url::to(['intervensao-social/create']); ?>">Novo</a></li>
              </ul>
            </li>

            <li class="parent <?php if ($page=='anuncio') { echo "active"; } ?>">
              <a>
                <i class="fa fa-font"></i> Anúncio
                <span class="fa fa-chevron-down"></span>
              </a>
              <ul class="nav child_menu">
                <li><a class="" href="<?= Url::to(['anuncio/index']); ?>">Anúncio</a></li>
                <li><a class="" href="<?= Url::to(['anuncio/create']); ?>">Novo</a></li>
              </ul>
            </li>

            <li class="parent <?php if ($page=='inscricao') { echo "active"; } ?>">
              <a>
                <i class="fa fa-plus"></i> Inscrição
                <span class="fa fa-chevron-down"></span>
              </a>
              <ul class="nav child_menu">
                <li><a class="" href="<?= Url::to(['inscricao/index']); ?>">Inscrição</a></li>
              </ul>
            </li>

            <li class="parent <?php if ($page=='informacao-contacto') { echo "active"; } ?>">
              <a>
                <i class="fa fa-dashboard"></i> Informação Contacto
                <span class="fa fa-chevron-down"></span>
              </a>
              <ul class="nav child_menu">
                <li><a class="" href="<?= Url::to(['informacao-contacto/index']); ?>">Informação Contacto</a></li>
                <li><a class="" href="<?= Url::to(['informacao-contacto/create']); ?>">Novo</a></li>
              </ul>
            </li>

          </ul>
        </div>
      </div>
    </div>
  </div>
