<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\date\DatePicker;
use kop\y2sp\ScrollPager;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\StockSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stocks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-index">
    <br>
    <br>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // Html::a('Create Stock', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showPageSummary' => true,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            [
                  'attribute'=>'Produto',
                  'value'=>'produto.nome',
                  'pageSummary' => 'Total',
            ],
            [
                  'attribute'=>'Utilizador',
                  'value'=>'utilizador.nome'
            ],
            //'quantidade',
            [
              'attribute'=>'Quantidade',
              'value'=>'quantidade',
              'format' => ['decimal', 2],
              'pageSummary' => true,
            ],
            [
              'attribute'=> 'Data Produzida',
              'value' => 'data_registo',
              'format' => 'raw',
              'filter' =>DatePicker::widget([
                  'model' => $searchModel,
                  'attribute' => 'data_registo',
                  'pluginOptions' => [
                      'autoclose'=>true,
                      'format' => 'yyyy-m-d'
                  ]
              ]),
              'contentOptions' => [
                    'class' => 'text-center'
              ]
            ],
            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{Mais}{Menos}{view}{delete}',
                'buttons' => [

                  'Mais' => function($url, $model) {
                    if($model['status'] == 10 &&  $model['quantidade']>=0){
                       return Html::a('<span class="btn btn-sm btn-success"><b class="glyphicon glyphicon-plus"></b></span>', ['aumentar', 'id' => $model['id']], ['title' => 'View', 'id' => 'modal-btn-view']);
                     }
                   },

                  'Menos' => function($url, $model) {
                    if($model['status'] == 10 &&  $model['quantidade'] > 0){
                       return Html::a('<span class="btn btn-sm btn-success"><b class="glyphicon glyphicon-minus"></b></span>', ['diminuir', 'id' => $model['id']], ['title' => 'View', 'id' => 'modal-btn-view']);
                     }
                   },

                  'view' => function($url, $model) {
            	         return Html::a('<span class="btn btn-sm btn-default"><b class="glyphicon glyphicon-eye-open"></b></span>', ['view', 'id' => $model['id']], ['title' => 'View', 'id' => 'modal-btn-view']);
            	     },
                   /*
            	     'update' => function($id, $model) {
            	        return Html::a('<span class="btn btn-sm btn-default"><b class="fa fa-pencil"></b></span>', ['update', 'id' => $model['id']], ['title' => 'Update', 'id' => 'modal-btn-view']);
            	     },*/

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
            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i>Stocks Produtos</h3>',
            'type'=>'success',
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
    ]);
    ?>
</div>
