<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\EstadoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-index">


    <table class="table table-striped table-hover">
        <thead>
            <th>Foto</th>
            <th>Nome</th>
            <th>data e hora Logada</th>
            <th>data e hora Termio</th>
        </thead>
          <?php
            if ($modelsEstado) {

                  foreach ($modelsEstado as $key => $estado) {
          ?>
                    <div class="col-md-4">
                      <tbody>

                          <tr>
                            <td>
                              <a href="<?= Url::to(['user/update','id'=>$estado['user']]); ?>" class="image-popup" title="">
                                  <img height="60px" width="60px" src="<?php echo Yii::getAlias('@web').'/'.$estado['photo'] ?>" class="thumb-img" title="<?= $estado['nome']; ?>" alt="<?= $estado['nome']; ?>" width="230" height='230'>
                              </a>
                            </td>

                            <td>
                              <?= $estado['nome']; ?>
                            </td>

                            <td>
                              <?= $estado['data_hr_inicio']; ?>
                            </td>

                            <td>
                              <?= $estado['data_hr_fim']; ?>
                            </td>

                          </tr>
                        </a>
                      </tbody>
                    </div>
                <?php
                  }
                ?>

                <th>Foto</th>
                <th>Nome</th>
                <th>data e hora Logada</th>
                <th>data e hora Termio</th>

                </table>

                <?php
                  }
                ?>

                <div class="row">
                    <div class="col-md-12">
                        <?php
                        if($modelsEstado){
                            echo LinkPager::widget([
                                'pagination' => $pages,
                            ]);
                        }
                        ?>
                    </div>
                </div>

</div>
