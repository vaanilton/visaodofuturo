<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use backend\models\Fornecedor;
use kartik\date\DatePicker;
use kop\y2sp\ScrollPager;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\EmprestimoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Emprestimos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emprestimo-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showPageSummary' => true,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            //'id',
            //'id_fornecedor',
            [
                'attribute'=>'Fornecedor',
                'value'=>function($data){
                  $fornecedor = Fornecedor::find()->where(['id'=>$data->id_fornecedor])->One();
                  if($fornecedor){
                     return $fornecedor->nome.' '.$fornecedor->sobrenome;
                  }
                },
                'pageSummary' => 'Total',
                'contentOptions' => [
                    'class' => 'text-center'
                 ]
            ],
            //'id_utilizador',
            //'tipo',
            [
                'attribute'=>'Tipo',
                'value'=>'tipo',
                'filter' => Html::activeDropDownList(
                  $searchModel, 'tipo',['Equipamento'=>'Equipamento', 'Medicamento'=>'Medicamento'],
                  [
                    'class'=>'form-control','prompt' => 'tipo'
                  ]
                )
            ],
            'nome',
            //'quantidade',
            [
              'attribute'=>'Quantidade',
              'value'=>'quantidade',
              'format' => ['decimal', 2],
              'pageSummary' => true,
            ],
            //'quantidade_monetario',
            [
              'attribute'=>'Total Monetario',
              'value'=>'quantidade_monetario',
              'format' => ['decimal', 2],
              'pageSummary' => true,
            ],
            //'data',

            'data_devolucao',
            /*[
              'attribute'=> 'Data Devolucao',
              'value' => 'data_devolucao',
              'format' => 'raw',
              'filter' =>DatePicker::widget([
                  'model' => $searchModel,
                  'attribute' => 'data_devolucao',
                  'pluginOptions' => [
                      'autoclose'=>true,
                      'format' => 'yyyy-m-d'
                  ]
              ])
            ],*/
            //'estado',
            [
                'attribute'=>'Estado',
                'value'=>'estado',
                'filter' => Html::activeDropDownList(
                  $searchModel, 'estado',['Debito'=>'Debito', 'Pago'=>'Pago'],
                  [
                    'class'=>'form-control','prompt' => 'Estado'
                  ]
                )
            ],
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

            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{view}{update}{delete}',
                'buttons' => [
                  'view' => function($url, $model) {
            	         return Html::a('<span class="btn btn-sm btn-default"><b class="glyphicon glyphicon-eye-open"></b></span>', ['view', 'id' => $model['id']], ['title' => 'View', 'id' => 'modal-btn-view']);
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
            'heading'=>'<h3 class="panel-title"><i class="fa fa-dollar"></i> Emprestimos</h3>',
            'type'=>'success',
            'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Registrar Emprestimos', ['create'], ['class' => 'btn btn-success']),
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
