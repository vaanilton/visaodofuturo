<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use backend\models\Cultivo;
use backend\models\Gado;
use backend\models\Profile;
use kartik\date\DatePicker;
use backend\models\CodigoProducao;
use kartik\editable\Editable;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProducaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Producao';
$this->params['breadcrumbs'][] = $this->title;
?>

<br>
<div class="producao-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php /*
    <div>
    <p>
        <?= Html::a('Create Producao', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    </div>
    */

    ?>

    <?php
      $profile = Profile::find()->where(['user_iduser' => Yii::$app->user->identity->id])->one();
      if($profile->tipo == 'Adiministrador' || $profile->tipo == 'Gestor'){ ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
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
                  'filter' => Html::activeDropDownList(
                    $searchModel, 'tipo',['Agricula'=>'Agricula', 'Picuaria'=>'Picuaria'],
                    [
                      'class'=>'form-control','prompt' => 'tipo'
                    ]
                  )
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
              ],*/
              [
                  'attribute'=>'Estado',
                  'value'=>'estado',
                  'filter' => Html::activeDropDownList(
                    $searchModel, 'estado', ['Analizar'=>'Analizar','Confirmado'=>'Confirmado', 'Comprado'=>'Comprado', 'Comprar'=>'Comprar'],
                    [
                      'class'=>'form-control','prompt' => 'Estado'
                    ]
                  )
              ],
              [
                'attribute'=> 'Data Produzida',
                'value' => 'data_colheita',
                'format' => 'raw',
                'filter' =>DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'data_colheita',
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
                  'template' => '{Comprar}{Confirmar}{Comprado}{view}{update}{delete}',
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
          ]);
        ?>

        <?php }else if($profile->tipo == "Operador"){ ?>

          <?=GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                  ['class' => 'yii\grid\SerialColumn'],
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
                        'value'=>function($data){
                          $cultivo = Cultivo::find()->where(['id'=>$data['id_cultivo']])->One();
                          $gado = Gado::find()->where(['id'=>$data['id_gado']])->One();
                          if($cultivo){
                             return $cultivo->nome_do_planteio;
                          }
                          else if($gado){
                             return $gado->nome;
                          }
                        },
                        'contentOptions' => [
              			          'class' => 'text-center'
              			    ]
                  ],
                  [
                    'attribute'=>'Tipo',
                    'value'=>'tipo',
                    'filter' => Html::activeDropDownList(
                      $searchModel, 'tipo',['Agricula'=>'Agricula', 'Picuaria'=>'Picuaria'],
                      [
                        'class'=>'form-control','prompt' => 'tipo'
                      ]
                    )
                  ],
                  'quantidade_producao',
                  'quantidade_perda',
                  'preco_kilo',
                  'data_colheita',
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
                  [
                    'attribute'=>'Estado',
                    'value'=>'estado'
                  ]
              ],
            ]);?>

        <?php }else if($profile->tipo == "Fiel_armazen"){ ?>

          <?=GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                  ['class' => 'yii\grid\SerialColumn'],
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
                      'value'=>function($data){
                        $cultivo = Cultivo::find()->where(['id'=>$data['id_cultivo']])->One();
                        $gado = Gado::find()->where(['id'=>$data['id_gado']])->One();
                        if($cultivo){
                           return $cultivo->nome_do_planteio;
                        }
                        else if($gado){
                           return $gado->nome;
                        }
                      },
                      'contentOptions' => [
                            'class' => 'text-center'
                      ]
                  ],
                  [
                    'attribute'=>'Tipo',
                    'value'=>'tipo',
                    'filter' => Html::activeDropDownList(
                      $searchModel, 'tipo',['Agricula'=>'Agricula', 'Picuaria'=>'Picuaria'],
                      [
                        'class'=>'form-control','prompt' => 'tipo'
                      ]
                    )
                  ],
                  'quantidade_producao',
                  'quantidade_perda',
                  'preco_kilo',
                  'data_colheita',
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
                  [
                    'attribute'=>'Estado',
                    'value'=>'estado',
                    'filter' => Html::activeDropDownList(
                      $searchModel, 'estado', ['Analizar'=>'Analizar', 'Confirmado'=>'Confirmado'],
                      [
                        'class'=>'form-control','prompt' => 'Estado'
                      ]
                    )
                  ],
                  [
                      'class' => 'yii\grid\ActionColumn',
                      'template' => '{Confirmar}',
                      'buttons' => [

                  	     'Confirmar' => function($url, $model) {
                           if($model['estado'] != 'Confirmado' && $model['estado'] != 'Comprado'){
                  	         return Html::a(
                               '<span class="btn btn-sm btn-primary">Confirmar<b class="fa fa-success"></b></span>',
                               ['confirmar', 'id' => $model['id']]
                             );
                           }
                  	     }
                      ]
                  ],
                  [
                      'class' => 'yii\grid\ActionColumn',
                      'template' => '{view}{update}',
                      'buttons' => [
                        'view' => function($url, $model) {
                  	         return Html::a('<span class="btn btn-sm btn-default"><b class="fa fa-search-plus"></b></span>', ['view', 'id' => $model['id']], ['title' => 'View', 'id' => 'modal-btn-view']);
                  	     },
                  	     'update' => function($id, $model) {
                  	        return Html::a('<span class="btn btn-sm btn-default"><b class="fa fa-pencil"></b></span>', ['update', 'id' => $model['id']], ['title' => 'Update', 'id' => 'modal-btn-view']);
                  	     },
                      ]
                 ],
              ],
            ]);?>

        <?php } ?>

</div>
