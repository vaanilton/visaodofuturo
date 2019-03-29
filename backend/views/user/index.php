<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
use backend\models\profile;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="utilizador-index">

  <div class="title_right">
    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Pesquisar Utilizador...">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">Pesquisar</button>
        </span>
      </div>
    </div>
  </div>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> Novo Utilizador', ['create'], ['class' => 'btn btn-success']) ?>
    </p>




    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_content">
            <div class="row">
              <?php
                  if ($modelsUsers) {
                      foreach ($modelsUsers as $key => $users) {
                          ?>
                          <div class="col-md-3 col-sm-8 col-xs-12 well profile_view ">
                            <div class="view-first">

                              <?php   if(file_exists($users['photo'])) { ?>

                              <a href="<?= Url::to(['user/view','id'=>$users['id']]); ?>" class="image-popup" title="">
                                <img src="<?php echo Yii::getAlias('@web').'/'.$users['photo'] ?>" class="thumb-img" title="<?= $users['username']; ?>" alt="<?= $users['username']; ?>" width="215" height='230' >
                              </a>

                            <?php }else{ ?>

                              <a href="<?= Url::to(['user/view','id'=>$users['id']]); ?>" class="image-popup" title="">
                                <img src='../../img/user/utilizador.jpg' class="thumb-img" title="<?= $users['username']; ?>" alt="<?= $users['username']; ?>" width="215" height='230' >
                              </a>

                            <?php } ?>

                            </div>

                            <div class="gal-detail thumb">
                              <h4 class="text-center"><?= $users['username']; ?></h4>
                              <div class="ga-border" style="height: 3px;width: 60px; background-color: #228bdf;margin: 10px auto;"></div>
                              <p class="text-muted text-center"><small><?= $users['tipo']; ?></small></p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-building"></i> Localidade: <?= $users['endereco']; ?></li>
                                <li><i class="fa fa-phone"></i> Telefone #: <?= $users['telefone']; ?></li>
                              </ul>
                              <div class="btn-group">
                                <a href="#" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </a>
                                  <div class="col-xs-12 bottom text-center">
                                    <div class="col-xs-10 col-sm-6 emphasis">

                                      <?php if(Yii::$app->user->identity->id == $users['id']){?>
                                        <a href="<?= Url::to(['user/update','id'=>$users['id']]); ?>">
                                          <i class="fa fa-edit"></i>&nbsp;
                                          <span>Editar</span>
                                        </a>
                                      <?php }else{ ?>
                                        <a href="<?= Url::to(['user/view','id'=>$users['id']]); ?>">
                                          <i class="fa fa-search-plus"></i>&nbsp;
                                          <span>Visualizar</span>
                                        </a>
                                      <?php }?>

                                    </div>
                                    <div class="col-xs-10 col-sm-6 emphasis">
                                      <a href="<?= Url::to(['user/bloquear','id'=>$users['id']]); ?>" data-confirm="Tem a certeza que pretende apagar este user?" data-method="post">
                                          <i class="fa fa-lock"></i>&nbsp;
                                          <span>Bloquear</span>
                                      </a>
                                    </div>
                                  </div>
                              </div>
                            </div>

                          </div>
                          <?php
                      }
                  }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <?php
        if($modelsUsers){
            echo LinkPager::widget([
                'pagination' => $pages,
            ]);
        }
        ?>
    </div>
</div>

<?php echo $this->render('modalCreateUser',[
    'modelProfile'=>$modelProfile,
    'model'=>$model]);
?>
