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
            if($modelsCultivo){
              foreach ($modelsCultivo as $key => $cultivo) {
            ?>
            <div class="col-md-55">
              <div class="thumbnail">
                <div class="image view view-first">
                  <img style="width: 100%; display: block;" src="<?php echo Yii::getAlias('@web').'/'.$cultivo['photo'] ?>" alt="image">
                  <div class="mask">
                    <p><?php echo $cultivo['nome_do_planteio'] ?><br></p>
                    </div>
                    <div class="mask">
                    <div class="tools tools-bottom">
                      <a href="<?= Url::to(['cultivo/view', 'id' => $cultivo['id']]) ?>"><i class="fa fa-eye"></i></a>
                      <a href="<?= Url::to(['cultivo/update', 'id' => $cultivo['id']]) ?>"><i class="fa fa-pencil"></i></a>
                      <a href="<?= Url::to(['cultivo/apagar', 'id' => $cultivo['id']]) ?>"><i class="fa fa-trash"></i></a>
                    </div>
                  </div>
                </div>
                <div class="caption">
                  <p style="text-align: center;font-size: 14px;">
                    <strong>
                      <?php echo $cultivo['nome_do_planteio'] ?>
                    </strong>
                  </p>
                  <p style="text-align: center;font-size: 14px;">
                    <strong>
                      Data: <?php echo $cultivo['data_do_planteio'] ?>
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
