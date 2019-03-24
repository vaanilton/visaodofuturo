<?php

use yii\helpers\Html;

use backend\models\Fornecedor;
use backend\models\Regiao;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use backend\models\Gado;
use kartik\grid\GridView;
use backend\models\Cultivo;
use backend\models\Profile;
use backend\models\ProducaoSearch;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\GadoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gado-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php /* Html::a('Create Gado', ['create'], ['class' => 'btn btn-success']) */?>
    </p>

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

    <?php $profile = Profile::find()->where(['user_iduser' => Yii::$app->user->identity->id])->one();
      if($profile->tipo == 'Adiministrador' || $profile->tipo == 'Gestor'){ ?>

        <?= GridView::widget([
           'dataProvider' => $dataProvider,
           'filterModel' => $searchModel,
           'showPageSummary' => true,
           'export'=> false,
           'pjax'=> true,
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
                 $searchModel->id_gado = $model->id;
                 $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

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
                 'pageSummary' => 'Total',
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
             //'quantidade',
             [
               'attribute'=>'Quantidade',
               'value'=>'quantidade',
               'format' => ['decimal', 2],
               'pageSummary' => true,
             ],
             [
                 'attribute'=>'Nome Pastor',
                 'value'=>function($data){
                   $fornecedor = Fornecedor::find()->where(['id'=>$data->id_fornecedor])->One();
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
                   $regiao = Regiao::find()->where(['id'=>$data->id_regiao])->One();
                   if($regiao){
                      return $regiao->localidade;
                   }
                 },
                   'contentOptions' => [
                       'class' => 'text-center'
                    ]
             ],
             'data_registo',
             [
                 'class' => 'kartik\grid\BooleanColumn',
                 'attribute' => 'status',
                 'vAlign' => 'middle'
             ],
             [
                 'class' => 'kartik\grid\ActionColumn',
                 'template' => '{Mais}{Menos}{Produzir}{Comprar}{view}{update}{delete}',
                 'buttons' => [

                    'Produzir' => function($url, $model) {
                      if($model['status'] == 10 &&  $model['quantidade']!=0){
                        return Html::a(
                          '<span class="btn btn-sm btn-primary">Produzir<b class="fa fa-success"></b></span>',
                          ['producao/pecuaria', 'id' => $model['id']]
                        );
                      }
                    },

                    'Comprar' => function($url, $model) {
                      if($model['status'] == 10 &&  $model['quantidade']!=0){
                        return Html::a(
                          '<span class="btn btn-sm btn-success"><b class="fa fa-shopping-cart"></b></span>',
                          ['gado/comprar', 'id' => $model['id']]
                        );
                      }
                    },

                   'Mais' => function($url, $model) {
                     if($model['status'] == 10 &&  $model['quantidade']!=0){
                        return Html::a('<span class="btn btn-sm btn-success"><b class="glyphicon glyphicon-plus"></b></span>', ['historial-gado/aumentar', 'id' => $model['id']], ['title' => 'View', 'id' => 'modal-btn-view']);
                      }
                    },

                   'Menos' => function($url, $model) {
                     if($model['status'] == 10 &&  $model['quantidade']!=0){
                        return Html::a('<span class="btn btn-sm btn-success"><b class="glyphicon glyphicon-minus"></b></span>', ['historial-gado/diminuir', 'id' => $model['id']], ['title' => 'View', 'id' => 'modal-btn-view']);
                      }
                    },

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
               'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Gados</h3>',
               'type'=>'success',
               'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Registrar Gado', ['create'], ['class' => 'btn btn-success']),
               'after'=>Html::a('<i class="fas fa-redo"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),
               'footer'=>true
           ],
         ]);?>

     <?php }else if($profile->tipo == 'Operador'){ ?>

       <?= GridView::widget([
          'dataProvider' => $dataProvider,
          'filterModel' => $searchModel,
          'export'=> false,
          'pjax'=> true,
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
                $searchModel->id_cultivo = $model->id;
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

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
            'quantidade',
            [
                'attribute'=>'Nome Pastor',
                'value'=>function($data){
                  $fornecedor = Fornecedor::find()->where(['id'=>$data->id_fornecedor])->One();
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
                  $regiao = Regiao::find()->where(['id'=>$data->id_regiao])->One();
                  if($regiao){
                     return $regiao->localidade;
                  }
                },
                  'contentOptions' => [
                      'class' => 'text-center'
                   ]
            ],
            'data_registo',
            /*[
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
            ],*/
            [
                'class' => 'kartik\grid\BooleanColumn',
                'attribute' => 'status',
                'vAlign' => 'middle'
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{Mais}{Menos}{Produzir}',
                'buttons' => [

                  'Mais' => function($url, $model) {
                    if($model['status'] == 10 &&  $model['quantidade']!=0){
                       return Html::a('<span class="btn btn-sm btn-success"><b class="glyphicon glyphicon-plus"></b></span>', ['fornecedor/imprimirproducao', 'id' => $model['id']], ['title' => 'View', 'id' => 'modal-btn-view']);
                     }
                   },

                  'Menos' => function($url, $model) {
                    if($model['status'] == 10 &&  $model['quantidade']!=0){
                       return Html::a('<span class="btn btn-sm btn-success"><b class="glyphicon glyphicon-minus"></b></span>', ['fornecedor/imprimirproducao', 'id' => $model['id']], ['title' => 'View', 'id' => 'modal-btn-view']);
                     }
                   },
                   'Produzir' => function($url, $model) {
                     if($model['status'] == 10){
                       return Html::a(
                         '<span class="btn btn-sm btn-danger">Produzir<b class="fa fa-success"></b></span>',
                         ['producao/pecuaria', 'id' => $model['id']]
                       );
                     }
                   }
                ]
            ],
          ],
          'panel' => [
              'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Gados</h3>',
              'type'=>'success',
              'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Registrar Gado', ['create'], ['class' => 'btn btn-success']),
              'after'=>Html::a('<i class="fas fa-redo"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),
              'footer'=>true
          ],
        ]);?>

     <?php } ?>

</div>
