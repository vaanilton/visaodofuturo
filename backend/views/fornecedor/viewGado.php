<?php

  use yii\helpers\Html;
  use yii\widgets\DetailView;
  use backend\models\Fornecedor;
  use backend\models\Regiao;
  use backend\models\Producao;
  use yii\helpers\Url;
  use yii\widgets\LinkPager;
  use kartik\grid\GridView;
  use yii\helpers\ArrayHelper;
  use backend\models\Cultivo;
  use backend\models\Gado;
  use kartik\date\DatePicker;
  use backend\models\ProducaoSearch;
  /* @var $this yii\web\View */
  /* @var $model backend\models\Fornecedor */

  ?>
  <div class="x_panel">
    <div class="row">
      <div class="col-md-12">
        <div class="x_content">

          <div class="row">

            <?php
            if($modelsGado){
              foreach ($modelsGado as $key => $gado) {
            ?>
            <div class="col-md-55">
              <div class="thumbnail">
                <div class="image view view-first">
                  <img style="width: 100%; display: block;" src="<?php echo Yii::getAlias('@web').'/'.$gado['photo'] ?>" alt="image">
                  <div class="mask">
                    <p><?php echo $gado['nome'] ?></p>
                    <div class="tools tools-bottom">
                      <a href="<?= Url::to(['gado/view', 'id' => $gado['id']]) ?>"><i class="fa fa-eye"></i></a>
                      <a href="<?= Url::to(['gado/update', 'id' => $gado['id']]) ?>"><i class="fa fa-pencil"></i></a>
                      <a href="<?= Url::to(['gado/apagar', 'id' => $gado['id']]) ?>"><i class="fa fa-trash"></i></a>
                    </div>
                  </div>
                </div>
                <div class="caption">
                  <p>
                    <strong>
                      <?php echo $gado['nome'] ?>
                    </strong>
                  </p>
                  <p>
                    <strong>
                      data: <?php echo $gado['data_registo'] ?>
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
