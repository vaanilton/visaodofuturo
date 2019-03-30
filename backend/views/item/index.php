<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kop\y2sp\ScrollPager;
use backend\models\Parceiro;
use backend\models\profile;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            //'id',
            //'id_utilizador',
            [
                  'attribute'=>'Nome Utilizador',
                  'value'=>'utilizador.nome',
            ],
            //'id_parceiro',
            [
                  'attribute'=>'Nome Parceiro',
                  'value'=>'parceiro.nome',
                  'filter' => Html::activeDropDownList($searchModel, 'id_parceiro',ArrayHelper::map(
                      Parceiro::find()->asArray()->all(), 'id', 'nome'),
                      ['class'=>'form-control','prompt' => 'Selecionar Parceiro']
                    ),
                    'contentOptions' => [
                         'class' => 'text-center'
                   ]
            ],
            'codigo',
            'nome',
            'iva',
            'unidade_caixa',
            'unidade_caixa_iva',
            'preco_caixa_iva',
            'preco_item',
            'data_registrado',
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
            'heading'=>'<h3 class="panel-title"><i class="fa fa-barcode"></i> Item (Produto)</h3>',
            'type'=>'success',
            'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i>Novo Item (Produto)', ['create'], ['class' => 'btn btn-success']),
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
