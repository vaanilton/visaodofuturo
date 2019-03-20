<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Equipa */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Equipas', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="equipa-view">

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
                'label'=>'Photo',
                'format'=>'html',
                'value'=>function($data){
                  return Html::img(Yii::getAlias('@web').'/'.$data->photo,[
                    'width'=>'400px', 'width'=>'350px'
                  ]);
                }
            ],
            'nome',
            'sobrenome',
            'tipo',
            'google',
            'facebook',
            'tweter',
        ],
    ]) ?>

</div>
