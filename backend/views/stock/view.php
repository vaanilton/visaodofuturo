<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Produto;
use backend\models\Profile;
/* @var $this yii\web\View */
/* @var $model backend\models\Stock */

$this->title = 'View';
$this->params['breadcrumbs'][] = ['label' => 'Stocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-view">

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
              'attribute'=>'Nome Produto',
              'value'=>function($data){
                  $fr = Produto::find()->where(['id'=>$data->id_produto, 'status'=>10])->one();
                  return $fr->nome;
              }
            ],
            [
              'attribute'=>'Utilizador',
              'value'=>function($data){
                  $fr = Profile::find()->where(['user_iduser'=>$data->id_utilizador])->one();
                  return $fr->nome;
              }
            ],

            'quantidade',
            'data_registo',
        ],
    ]) ?>

</div>
