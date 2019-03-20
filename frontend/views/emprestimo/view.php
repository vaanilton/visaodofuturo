<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\Fornecedor;
use frontend\models\Profile;
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
            [
              'attribute'=>'Fornecedor',
              'value'=>function($pegar){
                  $fr = Fornecedor::find()->where(['id'=>$pegar->id_fornecedor, 'status'=>10])->one();
                  return $fr->nome.' '.$fr->sobrenome;
              }
            ],
            'tipo',
            'descricao',
            [
              'attribute'=>'Quantidade',
              'value'=>function($pegar){
                  return $pegar->quantidade.' $00';
              }
            ],
            [
              'attribute'=>'Utilizador',
              'value'=>function($pegar){
                  $fr = Profile::find()->where(['user_iduser'=>$pegar->id_utilizador])->one();
                  return $fr->nome.' '.$fr->sobrenome;
              }
            ],
            'data',

        ],
    ]) ?>

</div>
