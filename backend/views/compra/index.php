<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use backend\models\Producao;
use backend\models\Cultivo;
use backend\models\Gado;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\CompraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Compras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compra-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // Html::a('Create Compra', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showPageSummary' => true,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            [
                  'attribute'=>'Utilizador',
                  'value'=>'utilizador.nome'
            ],
            [
              'attribute'=>'Nome Produto',
              'pageSummary' => 'Total',
              'value'=>function($data){
                  $producao = Producao::find()->where(['id'=>$data->id_producao])->One();
                  if($producao){
                    $cultivo = Cultivo::find()->where(['id'=>$producao->id_cultivo])->One();
                    if($cultivo){
                      return $cultivo->nome_do_planteio;
                    }else return $producao->designacao;
                  }else {
                    $gado = Gado::find()->where(['id'=>$data->id_gado])->One();
                    if($gado){
                      return $gado->nome;
                    }
                  }
              }
            ],
            //'quantidade',
            [
              'attribute'=>'Quantidade Comprada',
              'value'=>'quantidade',
              'format' => ['decimal', 2],
              'pageSummary' => true,
            ],
            //'preco_total',
            [
              'attribute'=>'Preço Total',
              'value'=>'preco_total',
              'format' => ['decimal', 2],
              'pageSummary' => true,
            ],
            //'data',
            [
              'attribute'=> 'Data Registrado',
              'value' => 'data',
              'format' => 'raw',
              'filter' =>DatePicker::widget([
                  'model' => $searchModel,
                  'attribute' => 'data',
                  'pluginOptions' => [
                      'autoclose'=>true,
                      'format' => 'yyyy-m-d'
                  ]
              ])
            ],
            //'estado',

            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{view}{update}{delete}',
                'buttons' => [
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
            'heading'=>'<h3 class="panel-title"><i class="fa fa-shopping-cart"></i> Compras de Produções Realizadas</h3>',
            'type'=>'success',
            'after'=>Html::a('<i class="fas fa-redo"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),
            'footer'=>true
        ],
    ]); ?>
</div>
