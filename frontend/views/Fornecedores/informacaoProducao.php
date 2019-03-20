<?php
  use yii\helpers\Url;
  use yii\grid\GridView;
  use backend\models\Cultivo;
  use backend\models\Gado;
  use backend\models\Profile;
  use kartik\date\DatePicker;
  use yii\helpers\Html;
?>

<div class="x_panel col-md-6 col-sm-6 col-xs-12">
  <div class="fixed_height_260">
    <div class="x_title">
      <h2>Produções</h2>
      <div class="clearfix"></div>
    </div>

      <?= GridView::widget([
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
                'attribute'=>'Designacao',
                'value'=>'designacao',
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
              /*[
                  'attribute'=>'Estado',
                  'value'=>'estado',
                  'filter' => Html::activeDropDownList(
                    $searchModel, 'estado', ['Comprado'=>'Comprado', 'Comprar'=>'Comprar'],
                    [
                      'class'=>'form-control','prompt' => 'Estado'
                    ]
                  )
              ],*/
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
            ],
          ]);
      ?>

  </div>
</div>
