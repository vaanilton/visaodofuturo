<?php

  use yii\helpers\Html;
  use yii\widgets\DetailView;
  use backend\models\Fornecedor;
  use backend\models\Regiao;
  use backend\models\Producao;
  use yii\helpers\Url;
  use yii\widgets\LinkPager;
  use kartik\grid\GridView;
  use yii\helpers\ArrayHelper;
  use backend\models\Cultivo;
  use backend\models\Gado;
  use kartik\date\DatePicker;
  use backend\models\ProducaoSearch;
  use kartik\export\ExportMenu;
  use kop\y2sp\ScrollPager;
  /* @var $this yii\web\View */
  /* @var $model backend\models\Fornecedor */


  ?>

  <?php
    $gridColumns = [
      ['class' => 'yii\grid\SerialColumn'],

      'quantidade_producao',
      'quantidade_perda',
      'preco_kilo',

      ['class' => 'yii\grid\ActionColumn'],
    ];

    // Renders a export dropdown menu
    /*echo ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns
    ]);*/
  ?>

  <?= GridView::widget([
      'dataProvider' => $dataProvider,
      'hover' => true,
      'showPageSummary' => true,
      'columns' => [
        ['class' => 'kartik\grid\SerialColumn'],
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

        [
            'attribute'=>'Nome',
            'pageSummary' => 'Total',

            'value'=>function($data){
              $cultivo = Cultivo::find()->where(['id'=>$data['id_cultivo']])->One();
              $gado = Gado::find()->where(['id'=>$data['id_gado']])->One();
              if($cultivo){
                 return $cultivo->nome_do_planteio;
              }
              else
                 return $data['designacao'];

            },
            'contentOptions' => [
                'class' => 'text-center'
             ]
        ],

        [
            'attribute'=>'Tipo',
            'value'=>'tipo',
        ],
        //'quantidade_producao',
        [
          'attribute'=>'Total Produzido',
          'value'=>'quantidade_producao',
          'format' => ['decimal', 2],
          'pageSummary' => true,
        ],
        //'quantidade_perda',
        [
          'attribute'=>'Total Perda',
          'value'=>'quantidade_perda',
          'format' => ['decimal', 2],
          'pageSummary' => true,
        ],
        //'preco_kilo',
        [
            'class' => 'kartik\grid\FormulaColumn',
            'header' => 'Total(QP - Qp)',

            'value' => function ($model, $key, $index, $widget) {
                $p = compact('model', 'key', 'index');
                return $widget->col(4, $p) - $widget->col(5, $p);
            },
            'format' => ['decimal', 2],

            'pageSummary' => true,
            'pageSummaryFunc' => GridView::F_AVG,
            'footer' => true
        ],
        [
          'attribute'=>'Preço Total',
          'value'=>'preco_kilo',
          'format' => ['decimal', 2],
          'pageSummary' => true,
        ],
        /*[
            'attribute'=>'Codigo',
            'value'=>function($data){
              $codigo_producao = CodigoProducao::find()->where(['id'=>$data['codigo_producao_id']])->One();
              if($codigo_producao){
                 return $codigo_producao->codigo;
              }
            },
            'contentOptions' => [
                  'class' => 'text-center'
            ]
        ],
        [
            'attribute'=>'Estado',
            'value'=>'estado',
        ],*/
        [
          'attribute'=> 'Data Produzida',
          'value' => 'data_colheita',
          'format' => 'raw',
          'contentOptions' => [
                'class' => 'text-center'
          ]
        ],
        /*[
            'attribute'=>'Nome Portador',

            'value'=>function($data){
              $cultivo = Cultivo::find()->where(['id'=>$data['id_cultivo']])->One();
              $gado = Gado::find()->where(['id'=>$data['id_gado']])->One();
              if($cultivo){
                 return $cultivo->id_fornecedor;
              }else if($gado){
                return $gado->id_fornecedor;
              }

            },
            'contentOptions' => [
                'class' => 'text-center'
             ]
        ],*/
        [
            'class' => 'kartik\grid\ActionColumn',
            'template' => '{Comprar}{Confirmar}{Comprado}',
            'buttons' => [

                'Confirmar' => function($url, $model) {
                    if($model['estado'] != 'Confirmado' && $model['estado'] != 'Comprado'){
                     return Html::a(
                        '<span class="btn btn-sm btn-primary">Confirmar<b class="fa fa-success"></b></span>',
                        ['confirmar', 'id' => $model['id']]
                      );
                    }
                 },

               'Comprar' => function($url, $model) {
                 if($model['estado'] == 'Confirmado'){
                   return Html::a(
                     '<span class="btn btn-sm btn-primary">Comprar<b class="fa fa-success"></b></span>',
                     ['comprar', 'id' => $model['id']]
                   );
                 }
               },

               'Comprado' => function($url, $model) {
                 if($model['estado'] == 'Comprado'){
                   return Html::a(
                     '<span disabled class="btn btn-sm btn-success">Comprado<b class="fa fa-success"></b></span>'
                   );
                 }
               },
            ]
        ],
        [
            'class' => 'kartik\grid\ActionColumn',
            'template' => '{Imprimir}{view}{update}{delete}',
            'buttons' => [
              'Imprimir' => function($url, $model) {
                   return Html::a('<span class="btn btn-sm btn-default"><b class="glyphicon glyphicon-print"></b></span>', ['fornecedor/imprimirproducao', 'id' => $model['id']], ['title' => 'View', 'id' => 'modal-btn-view']);
               },
              'view' => function($url, $model) {
                   return Html::a('<span class="btn btn-sm btn-default"><b class="fa fa-search-plus"></b></span>', ['view', 'id' => $model['id']], ['title' => 'View', 'id' => 'modal-btn-view']);
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
         'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Produções</h3>',
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
