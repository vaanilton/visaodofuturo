<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Fornecedor;
/* @var $this yii\web\View */
/* @var $model backend\models\Emprestimo */

$this->title = 'View';
$this->params['breadcrumbs'][] = ['label' => 'Emprestimos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emprestimo-view">

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
            //'id_fornecedor',
            [
                'attribute'=>'Fornecedor',
                'value'=>function($data){
                  $fornecedor = Fornecedor::find()->where(['id'=>$data->id_fornecedor])->One();
                  if($fornecedor){
                     return $fornecedor->nome.' '.$fornecedor->sobrenome;
                  }
                }
            ],
            'id_utilizador',
            'tipo',
            'nome',
            'quantidade',
            'data',
            'data_devolucao',
            'quantidade_monetario',
            'estado',
        ],
    ]) ?>

</div>
