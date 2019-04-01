<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Parceiro;
use backend\models\Profile;
/* @var $this yii\web\View */
/* @var $model backend\models\Item */

$this->title = 'View';
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-view">
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
            //'id',
            //'id_utilizador',
            [
                  'attribute'=>'Nome Utilizador',
                  'value'=>function($data){
                      $fr = Profile::find()->where(['user_iduser'=>$data->id_utilizador])->one();
                      return $fr['nome'].' '.$fr['sobrenome'];
                   }
            ],
            //'id_parceiro',
            [
                  'attribute'=>'Nome Parceiro',
                  'value'=>function($data){
                      $fr = Parceiro::find()->where(['id'=>$data->id_parceiro, 'status'=>10])->one();
                      return $fr['nome'];
                   }
            ],
            'codigo',
            'nome',
            'iva',
            'unidade_caixa',
            'unidade_caixa_iva',
            'preco_caixa_iva',
            'preco_item',
            'data_registrado',
            //'status',
        ],
    ]) ?>

</div>
