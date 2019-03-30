<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Regiao;
use backend\models\Profile;
/* @var $this yii\web\View */
/* @var $model backend\models\Cliente */

$this->title = 'View';
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-view">

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
            //'id_regiao',
            [
                  'attribute'=>'Nome Região',
                  'value'=>function($data){
                      $fr = Regiao::find()->where(['id'=>$data->id_regiao])->one();
                      return $fr['localidade'];
                   }
            ],
            'nome',
            'sobrenome',
            'estado_civil',
            'sexo',
            'data_nascimento',
            'contacto',
            'email:email',
            'bi',
            'nif',
            //'status',
        ],
    ]) ?>

</div>
