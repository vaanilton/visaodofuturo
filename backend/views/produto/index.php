<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use backend\models\CodigoProducao;
use kop\y2sp\ScrollPager;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProdutoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produto-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php /*Html::a('Create Produto', ['create'], ['class' => 'btn btn-success'])*/ ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
              'label'=>'Photo',
              'format'=>'html',
              'value'=>function($data){
                return Html::img(Yii::getAlias('@web').'/'.$data->photo,[
                  'width'=>'60px', 'height'=> '60px'
                ]);
              }
            ],
            'nome',
            'descricao',
            'preco',
            [
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

            //'data_registo',

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
        'panel' => [
            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Produtos</h3>',
            'type'=>'success',
            'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Registrar Produtos', ['create'], ['class' => 'btn btn-success']),
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
