<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Anuncio */

$this->title = 'View';
$this->params['breadcrumbs'][] = ['label' => 'Anuncios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anuncio-view">

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
            'descricao:ntext',
            'requisitos:ntext',
            'data',
            //'status',
            [
                'attribute'=>'Estatus',
                'value'=>function($model) {

                    if($model->status == 10){
                      return 'Activo';
                    }else if($model->status == 0){
                      return 'Inativo';
                    }
                 }
            ],
        ],
    ]) ?>

</div>
