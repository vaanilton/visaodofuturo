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
