<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use backend\models\Profile;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\RegiaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Regiaos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regiao-index">

  <?php $profile = Profile::find()->where(['user_iduser' => Yii::$app->user->identity->id])->one();
    if($profile->tipo == 'Adiministrador' || $profile->tipo == 'Gestor'){ ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'localidade',
            'pais',
            'ilha',
            'cidade',
            'municipio',
            'rua',
            //'latitude',
            //'longitude',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}{delete}',
                'buttons' => [
                  'view' => function($url, $model) {
            	         return Html::a('<span class="btn btn-sm btn-default"><b class="fa fa-eye"></b></span>', ['view', 'id' => $model['id']], ['title' => 'View', 'id' => 'modal-btn-view']);
            	     },
            	     'update' => function($id, $model) {
            	        return Html::a('<span class="btn btn-sm btn-default"><b class="fa fa-pencil"></b></span>', ['update', 'id' => $model['id']], ['title' => 'Update', 'id' => 'modal-btn-view']);
            	     },
            	     'delete' => function($url, $model) {
            	         return Html::a(
                         '<span class="btn btn-sm btn-danger"><b class="fa fa-trash"></b></span>',
                         [
                           'delete', 'id' => $model['id']
                         ],
                         [
                           'title' => 'Delete',
                           'class' => '',
                           'data' => [
                             'confirm' => 'Tem certeza que pretende eliminar esta producao.',
                             'method' => 'post',
                             'data-pjax' => false
                           ],
                         ]
                       );
            	     }
                ]
           ],
        ],
        'panel' => [
            'heading'=>'<h3 class="panel-title"><i class="fa fa-dollar"></i> Regiões</h3>',
            'type'=>'success',
            'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Cadastrar Região', ['create'], ['class' => 'btn btn-success']),
            'after'=>Html::a('<i class="fas fa-redo"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),
            'footer'=>true
        ],
    ]); ?>

  <?php }else if($profile->tipo == "Operador"){ ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'localidade',
            'pais',
            'ilha',
            'cidade',
            'municipio',
            'rua',
            //'latitude',
            //'longitude',

        ],
        'panel' => [
            'heading'=>'<h3 class="panel-title"><i class="fa fa-dollar"></i> Regiões</h3>',
            'type'=>'success',

            'after'=>Html::a('<i class="fas fa-redo"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),
            'footer'=>true
        ],
    ]); ?>

  <?php } ?>

</div>
