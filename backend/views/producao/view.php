<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Profile;
use backend\models\Producao;
use backend\models\Cultivo;
use backend\models\Fornecedor;
use backend\models\Gado;
/* @var $this yii\web\View */
/* @var $model backend\models\Producao */

$this->title = 'view';
$this->params['breadcrumbs'][] = ['label' => 'Producaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producao-view">

    <p>

    <?php
        $profile = Profile::find()->where(['user_iduser' => Yii::$app->user->identity->id])->one();
        if($profile){
          if($profile->tipo === 'Adiministrador' || $profile->tipo === 'Gestor'){
          ?>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
                ])
            ?>
          <?php
          if($model->estado === 'Analizar'){
          ?>
              <?= Html::a('Confirmar', ['confirmar', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
          <?php
          }else if($model->estado === 'Confirmado'){
          ?>
              <?= Html::a('Comprar', ['comprar', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
          <?php
          }else if($model->estado === 'Comprado'){
          ?>
              <h1><?= Html::encode("Producao Comprado") ?></h1>
        <?php
          }
        }else if($profile->tipo === 'Fiel_armazen'){
          ?>
            <?php
            if($model->estado === 'Analizar'){
            ?>
                <?= Html::a('Confirmar', ['confirmar', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?php
            }else if($model->estado === 'Comprado'){
            ?>
                <h1><?= Html::encode("Producao Comprado") ?></h1>
            <?php
            }
            ?>
          <?php
          }
        }
        ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label'=>'Photo Produto',
                'format'=>'html',
                'value'=>function($data){
                    return Html::img(Yii::getAlias('@web').'/'.$data->photo,[
                      'width'=>'480px'
                    ]);
                }
            ],
            [
              'attribute'=>'Nome Fornecedor',
              'value'=>function($data){

                    $cultivo = Cultivo::find()->where(['id'=>$data->id_cultivo])->One();
                    $gado = Gado::find()->where(['id'=>$data->id_gado])->One();
                    if($cultivo){
                      $fr = Fornecedor::find()->where(['id'=>$cultivo->id_fornecedor])->one();
                      return $fr->nome.' '.$fr->sobrenome;
                    }else if($gado){
                      $fr = Fornecedor::find()->where(['id'=>$gado->id_fornecedor])->one();
                      return $fr->nome.' '.$fr->sobrenome;
                    }

              }
            ],
            'tipo',
            'quantidade_producao',
            'quantidade_perda',
            'data_colheita',
            [
              'attribute'=>'Preco/kg',
              'value'=>function($data){
                  return $data->preco_kilo.' $00';
              }
            ],
            [
              'attribute'=>'Total Faturado',
              'value'=>function($data){
                  $quant = $data->quantidade_producao - $data->quantidade_perda;
                  return $quant * $data->preco_kilo.' $00';
              }
            ],
        ],
    ]) ?>

</div>
