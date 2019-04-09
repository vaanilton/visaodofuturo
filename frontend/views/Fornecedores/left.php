<?php
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\models\Fornecedor;

$id = Yii::$app->user->identity['id'];
$fornecedor = Fornecedor::find()->where(['user_iduser' => $id])->One();
?>

  <div class="col-md-3 left_col sidebar">
    <div class="left_col scroll-view ">
      <div class="navbar nav_title" style="border: 0;">
        <a href="<?= Url::to(['site/inicial']); ?>" class="site_title">
          <img src="<?php echo Yii::getAlias('@web').'/img/visao.png' ?>" alt="" width=50 height=45>
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
                <img style="margin-right: 50px !important; width: 60px;" src="<?php echo Yii::getAlias('@web').'/'.$profile['photo']; ?>?>" alt="" class="img-circle profile_img">
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

            <li>
              <a href="<?= Url::to(['site/index']); ?>">
                <i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span>
              </a>
            </li>

            <li><a><i class="fa fa-dollar (alias)"></i> Emprestimo <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><?= Html::a('Estrato', ['emprestimo/index']) ?></li>
                <li><?= Html::a('Pendentes', ['emprestimo/pendentes']) ?></li>
              </ul>
            </li>

            <?php if($fornecedor->tipo == 'Agricultor-Pastor' || $fornecedor->tipo == 'Agricultor'){ ?>

            <li><a><i class="fa fa-tree"></i> Cultivo <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><?= Html::a('Cultivo', ['cultivo/index']) ?></li>
              </ul>
            </li>

            <?php } ?>

            <?php if($fornecedor->tipo == 'Agricultor-Pastor' || $fornecedor->tipo == 'Pastor'){ ?>

            <li><a><i class="fa fa-qq"></i> Gado <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><?= Html::a('Gado', ['gado/index']) ?></li>
              </ul>
            </li>

            <?php } ?>

            <li><a><i class="fa fa-cubes"></i>Producao <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><?= Html::a('Producao', ['producao/index']) ?></li>
              </ul>
            </li>

          </ul>
        </div>
      </div>
    </div>
  </div>
