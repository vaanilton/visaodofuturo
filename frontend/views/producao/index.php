<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use frontend\models\Cultivo;
use frontend\models\Gado;
use frontend\models\Regiao;
use frontend\models\Fornecedor;
use frontend\models\Profile;
use kartik\date\DatePicker;
use kop\y2sp\ScrollPager;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProducaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produção';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producao-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php /*
    <div>
    <p>
        <?= Html::a('Create Producao', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    </div>
    */?>

    <?= GridView::widget([
          'dataProvider' => $dataProvider,
          'filterModel' => $searchModel,
          'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'class' => 'kartik\grid\RadioColumn',
                'width' => '36px',
                'headerOptions' => ['class' => 'kartik-sheet-style'],
            ],

            /*[
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
            ],*/
            /*[
                'attribute'=>'Nome Portador',

                'value'=>function($data){
                  $cultivo = Cultivo::find()->where(['id'=>$data['id_cultivo']])->One();
                  $gado = Gado::find()->where(['id'=>$data['id_gado']])->One();
                  if($cultivo){
                      $fornecedor = Fornecedor::find()->where(['id'=>$cultivo->id_fornecedor])->One();
                     return $fornecedor->nome.' '.$fornecedor->sobrenome;
                  }else if($gado){
                      $fornecedor = Fornecedor::find()->where(['id'=>$gado->id_fornecedor])->One();
                     return $fornecedor->nome.' '.$fornecedor->sobrenome;
                  }

                },
                'contentOptions' => [
                    'class' => 'text-center'
                 ]
            ],*/
            [
                'attribute'=>'Região',

                'value'=>function($data){
                  $cultivo = Cultivo::find()->where(['id'=>$data['id_cultivo']])->One();
                  $gado = Gado::find()->where(['id'=>$data['id_gado']])->One();

                  if($cultivo){

                      $regiao = Regiao::find()->where(['id'=>$cultivo->id_regiao])->One();
                      return $regiao->localidade;

                  }else if($gado){

                      $regiao = Regiao::find()->where(['id'=>$gado->id_regiao])->One();
                      return $regiao->localidade;

                  }

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
            /*[
              'attribute'=>'Designacao',
              'value'=>'designacao',
              'contentOptions' => [
                    'class' => 'text-center'
              ]
            ],*/
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
                'attribute'=>'Estado',
                'value'=>'estado',
                'filter' => Html::activeDropDownList(
                  $searchModel, 'estado', ['Comprado'=>'Comprado', 'Comprar'=>'Comprar'],
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
                'template' => '{Imprimir}',
                'buttons' => [
                  'Imprimir' => function($url, $model) {
                       return Html::a('<span class="btn btn-sm btn-default">
                                        <b class="glyphicon glyphicon-print"></b>
                                      </span>',
                                      [
                                        'fornecedor/imprimirproducao',
                                        'id' => $model['id']
                                      ],
                                      [
                                        'title' => 'View',
                                        'id' => 'modal-btn-view'
                                      ]);
                  }
                ]
            ],
            [
              'class' => 'kartik\grid\CheckboxColumn',
              'headerOptions' => ['class' => 'kartik-sheet-style'],
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
</div>
