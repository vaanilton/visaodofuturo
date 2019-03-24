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

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

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
