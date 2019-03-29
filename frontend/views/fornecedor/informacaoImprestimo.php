<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use backend\models\Fornecedor;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\EmprestimoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>

<div class="emprestimo-index">

    <?= GridView::widget([
        'dataProvider' => $dataProviderEmprestimo,
        'filterModel' => $searchModelEmprestimo,
        'showPageSummary' => true,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            //'id',
            //'id_fornecedor',
            [
                'attribute'=>'Fornecedor',
                'value'=>function($data){
                  $fornecedor = Fornecedor::find()->where(['id'=>$data['id_fornecedor']])->One();
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
                  $searchModelEmprestimo, 'tipo',['Equipamento'=>'Equipamento', 'Medicamento'=>'Medicamento'],
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
                  $searchModelEmprestimo, 'estado',['Debito'=>'Debito', 'Pago'=>'Pago'],
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
                  'model' => $searchModelEmprestimo,
                  'attribute' => 'data',
                  'pluginOptions' => [
                      'autoclose'=>true,
                      'format' => 'yyyy-m-d'
                  ]
              ])
            ],
            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{Imprimir}',
                'buttons' => [
                  'Imprimir' => function($url, $model) {
                       return Html::a('<span class="btn btn-sm btn-default"><b class="glyphicon glyphicon-print"></b></span>', ['fornecedor/imprimiremprestimo', 'id' => $model['id']], ['title' => 'View', 'id' => 'modal-btn-view']);
                   },
                ]
           ],
        ],
        'panel' => [
            'heading'=>'<h3 class="panel-title"><i class="fa fa-dollar"></i> Emprestimos</h3>',
            'type'=>'success',
            'after'=>Html::a('<i class="fas fa-redo"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),
            'footer'=>true
        ],
    ]); ?>
</div>
