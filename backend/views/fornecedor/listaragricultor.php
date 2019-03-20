<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
/* @var $searchModel backend\mdels\FornecedorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Agricultores';
$this->params['breadcrumbs'][] = ['label' => 'Fornecedor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

  <div class="fornecedor-index">
    <div class="col-md-3">
      <p>
        <?= Html::a('Cadastrar Agricultor', ['agricultor'], ['class' => 'btn btn-success']) ?>
      </p>
    </div>

    <div class="col-md-9">
      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Pesquisar Agricultor...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Pesquisar</button>
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="x_panel">
      <div class="row">
        <div class="col-md-12">
          <div class="x_content">

            <div class="row">

              <?php
              if($modelsFornecedor){
                foreach ($modelsFornecedor as $key => $agricultor) {
              ?>
              <div class="col-md-55">
                <div class="thumbnail">
                  <div class="image view view-first">
                    <img style="width: 100%; display: block;" src="<?php echo Yii::getAlias('@web').'/'.$agricultor['photo'] ?>" alt="image">
                    <div class="mask">
                      <p><?php echo $agricultor['nome'] ?></p>
                      <div class="tools tools-bottom">
                        <a href="<?= Url::to(['fornecedor/view', 'id' => $agricultor['id']]) ?>"><i class="fa fa-eye"></i></a>
                        <a href="<?= Url::to(['fornecedor/update', 'id' => $agricultor['id']]) ?>"><i class="fa fa-pencil"></i></a>
                        <a href="<?= Url::to(['fornecedor/apagar', 'id' => $agricultor['id']]) ?>"><i class="fa fa-trash"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="caption">
                    <p>
                      <strong>
                        <?php echo $agricultor['nome'].' '.$agricultor['sobrenome'] ?>
                      </strong>
                    </p>
                    <p>
                      <strong>
                        Numero BI: <?php echo $agricultor['bi'] ?>
                      </strong>
                    </p>
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
  </div><br>
  <div class="row">
    <div class="col-md-12">
        <?php
        if($modelsFornecedor){
            echo LinkPager::widget([
                'pagination' => $pages,
            ]);
        }
        ?>
    </div>
  </div>
  </div>
