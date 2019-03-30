<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Profile;

/* @var $this yii\web\View */
/* @var $model backend\models\Parceiro */

$this->title = 'View';
$this->params['breadcrumbs'][] = ['label' => 'Parceiros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parceiro-view">

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
            'nome',
            'endereco',
            'nif',
            'data_registro',
            //'status',
        ],
    ]) ?>

</div>
