<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kop\y2sp\ScrollPager;
use backend\models\ItemSearch;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ParceiroSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Parceiros';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parceiro-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
          [
              'class' => 'kartik\grid\SerialColumn',
              'contentOptions' => ['class' => 'kartik-sheet-style'],
              'width' => '36px',
              'header' => '',
              'headerOptions' => ['class' => 'kartik-sheet-style']
          ],
          [
            'class' => 'kartik\grid\ExpandRowColumn',
            'value' => function($model, $key, $index, $column){
              return GridView::ROW_COLLAPSED;
            },
            'detail' => function($model, $key, $index, $column){
              $searchModel = new ItemSearch();
              $searchModel->id_parceiro = $model->id;
              $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

              return Yii::$app->controller->renderPartial('indexItemParceiro', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
              ]);
            }
          ],

            //'id',
            //'id_utilizador',
            [
                'label'=>'Logotipo',
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
            [
                  'attribute'=>'Utilizador',
                  'value'=>'utilizador.nome'
            ],
            'nome',
            'endereco',
            'nif',
            //'data_registro',
            //'status',

            [
                'class' => 'kartik\grid\ActionColumn',
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
        'panel' => [
            'heading'=>'<h3 class="panel-title"><i class="fa fa-group"></i> Parceiros (Fornecedores)</h3>',
            'type'=>'success',
            'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Novo Parceiro (Fornecedores)', ['create'], ['class' => 'btn btn-success']),
            'after'=>Html::a('<i class="fas fa-redo"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),
            'footer'=>true
        ],
        'pager' => [
            'class'     => ScrollPager::className(),
            'container' => '.grid-view tbody',
            'item'      => 'tr',
            'paginationSelector' => '.grid-view .pagination',
            'triggerTemplate' => '<tr class="ias-trigger"><td colspan="100%" style="text-align: center"><a style="cursor: pointer">{text}</a></td></tr>',
            'enabledExtensions'  => [
                ScrollPager::EXTENSION_SPINNER,
                //ScrollPager::EXTENSION_NONE_LEFT,
                ScrollPager::EXTENSION_PAGING,
            ],
        ],
    ]); ?>
</div>
