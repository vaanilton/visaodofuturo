<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use frontend\models\ProducaoSearch;
use backend\models\Fornecedor;
use backend\models\Regiao;
use backend\models\Gado;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use kartik\date\DatePicker;
use kop\y2sp\ScrollPager;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\GadoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gado-index">

    <?php /*
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nome',
            'descricao',
            'quantidade',
            'data_registo',
            //'id_fornecedor',
            //'id_regiao',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
     ?>

    <div class="row">

      <table class="table table-striped table-hover" >
        <thead>
          <th>Foto</th>
          <th>Nome</th>
          <th>Nome do Gado</th>
          <th>Regiao</th>
          <th>Quantidade</th>
          <th>Data Resgistrado</th>
          <th>Producao</th>
          <th>Editar</th>
          <th>Apagar</th>
        </thead>

          <?php
            if ($modelsgado) {
                foreach ($modelsgado as $key => $gado) {
          ?>
                  <div class="col-md-4">
                    <tbody>
                      <?php
                        $modelsFornecedor = Fornecedor::find()->where(['id'=>$gado['id_fornecedor'], 'status'=>10])->all();
                        if ($modelsFornecedor) {
                          foreach ($modelsFornecedor as $key => $fornecedor) {
                      ?>
                        <tr class='clickable-row' data-href='<?= Url::to(['cultivo/view','id'=>$gado['id']]); ?>'>

                          <td>
                            <a href="<?= Url::to(['cultivo/view','id'=>$gado['id']]); ?>" class="image-popup" title="">
                                <img height="60px" width="60px" src="<?php echo Yii::getAlias('@web').'/'.$gado['photo'] ?>" class="thumb-img" title="<?= $gado['nome']; ?>" alt="<?= $gado['nome']; ?>" width="230" height='230'>
                            </a>
                          </td>

                          <td>
                            <?= $fornecedor['nome']; ?> <br>
                            <?= $fornecedor['sobrenome']; ?>
                          </td>

                          <?php
                            }}
                          ?>

                          <td><?= $gado['nome']; ?> <br>
                            <?= $gado['descricao']; ?>
                          </td>

                          <?php
                            $modelsRegiao = Regiao::find()->where(['id'=>$gado['id_regiao']])->all();
                            if ($modelsRegiao) {
                              foreach ($modelsRegiao as $key => $regiao) {
                          ?>

                          <td>
                            <?= $regiao['descricao']; ?>
                          </td>

                          <?php
                            }}
                          ?>

                          <td><?= $gado['quantidade']; ?></td>

                          <td><?= $gado['data_registo']; ?></td>

                          <td>
                            <?= Html::a('', ['producao/pecuaria' , 'id' => $gado['id']], [
                                'class' => 'btn btn-success fa fa-check-square-o',

                            ]) ?>
                          </td>

                          <td>
                            <?= Html::a('', ['update', 'id' => $gado['id']], [
                            'class' => 'btn btn-primary fa fa-edit'
                            ]) ?>
                          </td>

                          <td>
                            <?= Html::a('', ['apagar', 'id' => $gado['id']], [
                                'class' => 'btn btn-danger fa fa-trash-o',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                          </td>

                        </tr>
                        <?php
                            }
                        ?>
                      </tbody>
                    </div>

                    <th>Foto</th>
                    <th>Nome</th>
                    <th>Nome do Gado</th>
                    <th>Regiao</th>
                    <th>Quantidade</th>
                    <th>Data Resgistrado</th>
                    <th>Producao</th>
                    <th>Editar</th>
                    <th>Apagar</th>
                </table>
              <?php
              }
              ?>

      </div>

      <div class="row">
          <div class="col-md-12">
              <?php
              if($modelsgado){
                  echo LinkPager::widget([
                      'pagination' => $pages,
                  ]);
              }
              ?>
          </div>
      </div>
      */ ?>


      <?= GridView::widget([
         'dataProvider' => $dataProvider,
         'filterModel' => $searchModel,
         'export'=> false,
         'pjax'=> true,
         'showPageSummary' => true,
         'toggleDataContainer' => ['class' => 'btn-group mr-2'],
           // set export properties
         'export' => [
               'fontAwesome' => true
         ],
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
               $searchModel = new ProducaoSearch();
               $searchModel->id_gado = $model['id'];
               $dataProvider = $searchModel->search(Yii::$app->request->queryParams, 'gado');

               return Yii::$app->controller->renderPartial('indexProducao', [
                 'searchModel' => $searchModel,
                 'dataProvider' => $dataProvider,
               ]);
             }
           ],
           [
               'class' => 'kartik\grid\RadioColumn',
               'width' => '36px',
               'headerOptions' => ['class' => 'kartik-sheet-style'],
           ],
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
               ],
               'pageSummary' => 'Total',
           ],
           [
               'attribute'=>'Nome Pastor',
               'value'=>function($data){
                 $fornecedor = Fornecedor::find()->where(['id'=>$data['id_fornecedor']])->One();
                 if($fornecedor){
                    return $fornecedor->nome.' '.$fornecedor->sobrenome;
                 }
               },
                 'contentOptions' => [
                     'class' => 'text-center'
                  ]
           ],
           [
               'attribute'=>'Regiao',
               'value'=>function($data){
                 $regiao = Regiao::find()->where(['id'=>$data['id_regiao']])->One();
                 if($regiao){
                    return $regiao->localidade;
                 }
               },
                 'contentOptions' => [
                     'class' => 'text-center'
                  ]
           ],
           'nome',
           /*[
               'attribute' => 'Gado',
               'value' => 'nome',
               'filter' => Html::activeDropDownList(
                 $searchModel, 'nome', [Gado::find()->asArray()->all(),'nome'],
                 [
                   'class'=>'form-control','prompt' => 'Gado'
                 ]
               )
           ],*/
           [
             'attribute'=>'Quantidade',
             'value'=>'quantidade',
             'format' => ['decimal', 2],
             'pageSummary' => true,
           ],
           [
             'attribute'=> 'Data Registrado',
             'value' => 'data_registo',
             'format' => 'raw',
             'filter' =>DatePicker::widget([
                 'model' => $searchModel,
                 'attribute' => 'data_registo',
                 'pluginOptions' => [
                     'autoclose'=>true,
                     'format' => 'yyyy-m-d'
                 ]
             ])
           ],
           /*[
               'class' => 'kartik\grid\BooleanColumn',
               'attribute' => 'status',
               'vAlign' => 'middle'
           ]*/
           [
             'class' => 'kartik\grid\CheckboxColumn',
             'headerOptions' => ['class' => 'kartik-sheet-style'],
           ],
         ],
         'panel' => [
             'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Gados</h3>',
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
       ]);?>

</div>
