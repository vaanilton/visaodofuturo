<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use backend\models\Fornecedor;
use backend\models\Regiao;
/* @var $this yii\web\View */
/* @var $model backend\models\Cultivo */
$this->title = 'View';
$this->params['breadcrumbs'][] = ['label' => 'Cultivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cultivo-view">
  <div class="x_panel">

    <h5 style="background-color: #D0DCE0;padding: 8px;font-size: 14px;
                font-family: Open Sans; letter-spacing:2px;
                vertical-align: baseline; line-height: 32px;
                font-style: negrito ;text-align: justify;"><?= Html::encode($this->title) ?>

      <div class="pull-right">
        <p>
          <?= Html::a('<i class="glyphicon glyphicon-refresh"></i> Atualizar Dados', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
          <?= Html::a('<i class="glyphicon glyphicon-trash"></i> Remover', ['delete', 'id' => $model->id], [
              'class' => 'btn btn-danger',
              'data' => [
                  'confirm' => 'Are you sure you want to delete this item?',
                  'method' => 'post',
              ],
          ]) ?>
        </p>
      </div>
    </h5>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label'=>'Photo',
                'format'=>'html',
                'value'=>function($data){
                  return Html::img(Yii::getAlias('@web').'/'.$data->photo,[
                    'width'=>'480px'
                  ]);
                }
            ],
            [
              'attribute'=>'Fornecedor',
              'value'=>function($data){
                  $fr = Fornecedor::find()->where(['id'=>$data->id_fornecedor, 'status'=>10])->one();
                  return $fr->nome.' '.$fr->sobrenome;
               }
            ],
            [
              'attribute'=>'Regiao',
              'value'=>function($data){
                  $fr = Regiao::find()->where(['id'=>$data->id_regiao])->one();
                  return $fr->localidade;
              }
            ],
            'descricao',
            'tamanho_do_solu',
            'nome_do_planteio',
            'data_do_planteio',
            'tempo_do_cultivo',
            'data_registro',
        ],
      ])
    ?>
    </div>
</div>
