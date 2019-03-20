<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Produto */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="produto-view">
  <div class="x_panel">
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
            //'id_compra',
            [
                'label'=>'Photo',
                'format'=>'html',
                'value'=>function($data){
                  return Html::img(Yii::getAlias('@web').'/'.$data->photo,[
                    'width'=>'480px'
                  ]);
                }
            ],
            'nome',
            'descricao',
            'preco',
            'data_registo',
        ],
    ]) ?>
  </div>
</div>
