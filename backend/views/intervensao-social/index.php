<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\IntervensaoSocialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Intervensao Social';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="intervensao-social-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Intervensao Social', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'photo',
            [
                'label'=>'Photo',
                'format'=>'html',
                'value'=>function($data){
                    return Html::img(Yii::getAlias('@web').'/'.$data['photo'],[
                      'width'=>'70px'
                    ]);
                },
                'contentOptions' => [
                      'class' => 'text-center'
                ]
            ],
            'nome',
            'descricao:ntext',
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
            //'estra',

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
                           'apagar', 'id' => $model['id']
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
    ]); ?>
</div>
