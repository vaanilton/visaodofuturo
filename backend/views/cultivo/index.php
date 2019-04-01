<?php
use yii\helpers\Html;
use kartik\grid\GridView;
use backend\models\Fornecedor;
use backend\models\Cultivo;
use backend\models\Profile;
use backend\models\Regiao;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use backend\models\ProducaoSearch;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kop\y2sp\ScrollPager;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CultivoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cultivos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cultivo-index">

  <h5 style="background-color: #D0DCE0;padding: 8px;font-size: 14px;
              font-family: Open Sans; letter-spacing:2px;
              vertical-align: baseline; line-height: 32px;
              font-style: negrito ;text-align: justify;"><?php echo date("d/m/Y");?>

    <div class="pull-right">

        <?php $form = ActiveForm::begin(['action' => ['index'],'method' => 'get',]); ?>

            <?= $form->field($searchModel, 'nome_do_planteio')
              ->label(false)
              ->textInput(['placeholder' => "Entre com o nome...",'type' => "text", 'class' => "form-control"])
        ?>
    </div>
    <div class="pull-right">

        <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-default', 'type'=>"Search"]) ?>

        <?php ActiveForm::end(); ?>

    </div>
  </h5>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

      <p>
          <?php /* Html::a('Create Cultivo', ['create'], ['class' => 'btn btn-success']) */?>
      </p>

      <?php /*
      <div class="col-md-9">
        <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Pesquisar Cultivo...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">Pesquisar</button>
              </span>
            </div>
          </div>
        </div>
      </div>

      <div class="x_panel">

      <div class="row">

        <table class="table table-striped table-hover" >
          <thead>
            <th>Foto</th>
            <th>Nome</th>
            <th>Nome da Plantacao</th>
            <th>Regiao</th>
            <th>Data do Planteio</th>
            <th>Amplitude Solo (m²)</th>
            <th>Data Resgistrado</th>
            <th>Producao</th>
            <th>Editar</th>
            <th>Apagar</th>
          </thead>

            <?php
              if ($modelscultivo) {
                  foreach ($modelscultivo as $key => $cultivo) {
            ?>
                    <div class="col-md-4">
                      <tbody>
                        <?php
                          $modelsFornecedor = Fornecedor::find()->where(['id'=>$cultivo['id_fornecedor'], 'status'=>10])->all();
                          if ($modelsFornecedor) {
                            foreach ($modelsFornecedor as $key => $fornecedor) {
                        ?>
                          <tr class='clickable-row' data-href='<?= Url::to(['cultivo/view','id'=>$cultivo['id']]); ?>'>

                            <td>
                              <a href="<?= Url::to(['cultivo/view','id'=>$cultivo['id']]); ?>" class="image-popup" title="">
                                  <img height="60px" width="60px" src="<?php echo Yii::getAlias('@web').'/'.$cultivo['photo'] ?>" class="thumb-img" title="<?= $cultivo['nome_do_planteio']; ?>" alt="<?= $cultivo['nome_do_planteio']; ?>" width="230" height='230'>
                              </a>
                            </td>

                            <td>
                              <?= $fornecedor['nome']; ?> <br>
                              <?= $fornecedor['sobrenome']; ?>
                            </td>

                            <?php
                              }}
                            ?>

                            <td><?= $cultivo['nome_do_planteio']; ?> <br>
                              <?= $cultivo['descricao']; ?>
                            </td>

                            <?php
                              $modelsRegiao = Regiao::find()->where(['id'=>$cultivo['id_regiao']])->all();
                              if ($modelsRegiao) {
                                foreach ($modelsRegiao as $key => $regiao) {
                            ?>

                            <td>
                              <?= $regiao['descricao']; ?>
                            </td>

                            <?php
                              }}
                            ?>

                            <td><?= $cultivo['data_do_planteio']; ?></td>
                            <td><?= $cultivo['tamanho_do_solu'].' (m²)'; ?></td>

                            <td><?= $cultivo['data_registro']; ?></td>

                            <td>
                              <?= Html::a('', ['producao/agricula' , 'id' => $cultivo['id']], [
                                  'class' => 'btn btn-success fa fa-check-square-o',

                              ]) ?>
                            </td>

                            <td>
                              <?= Html::a('', ['update', 'id' => $cultivo['id']], [
                              'class' => 'btn btn-primary fa fa-edit'
                              ]) ?>
                            </td>

                            <td>
                              <?= Html::a('', ['apagar', 'id' => $cultivo['id']], [
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
                      <th>Nome da Plantacao</th>
                      <th>Regiao</th>
                      <th>Data do Planteio</th>
                      <th>Amplitude Solo (m²)</th>
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
                if($modelscultivo){
                    echo LinkPager::widget([
                        'pagination' => $pages,
                    ]);
                }
                ?>
            </div>
        </div>
      </div>
      */?>

      <?php $profile = Profile::find()->where(['user_iduser' => Yii::$app->user->identity->id])->one();
        if($profile->tipo == 'Adiministrador' || $profile->tipo == 'Gestor'){ ?>

          <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            //'floatHeader'=>true,

            //'floatHeaderOptions'=>['scrollingTop'=>'50'],
            //'showPageSummary' => true,
            'resizableColumns'=>false,
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
              [
                   'attribute' => 'Nome Agricultor',
                   'value' => function ($model, $key, $index, $widget) {
                       return Html::a($model->fornecedor->nome.' '.$model->fornecedor->sobrenome,
                           ['fornecedor/view','id'=>$model->fornecedor->id],
                           ['title' => 'View author detail', 'onclick' => 'alert("Pretende Visualizar Agricultor")']);
                   },
                   'filterType' => GridView::FILTER_SELECT2,
                   'filter' => ArrayHelper::map(Fornecedor::find()->orderBy('nome')->asArray()->all(), 'id', 'nome'),
                   'filterWidgetOptions' => [
                       'pluginOptions' => ['allowClear' => true],
                   ],
                   'filterInputOptions' => ['placeholder' => 'Agricultor'],
                   'format' => 'raw'
               ],

               [
                   'attribute' => 'Regiao',
                   'value' => function ($model, $key, $index, $widget) {
                       return Html::a($model->regiao->localidade,
                           ['regiao/view','id'=>$model->regiao->id],
                           ['title' => 'View author detail', 'onclick' => 'alert("Pretende Visualizar Região")']);
                   },
                   'filterType' => GridView::FILTER_SELECT2,
                   'filter' => ArrayHelper::map(Regiao::find()->orderBy('localidade')->asArray()->all(), 'id', 'localidade'),
                   'filterWidgetOptions' => [
                       'pluginOptions' => ['allowClear' => true],
                   ],
                   'filterInputOptions' => ['placeholder' => 'Região'],
                   'format' => 'raw'
               ],
              'nome_do_planteio',
              /*[
                  'attribute' => 'Cultivo',
                  'value' => 'nome_do_planteio',
                  'filter' => Html::activeDropDownList(
                    $searchModel, 'nome_do_planteio', [Cultivo::find()->asArray()->all(),'nome_do_planteio'],
                    [
                      'class'=>'form-control','prompt' => 'Planteio'
                    ]
                  )
              ],*/
              'data_do_planteio',
              /*[
                'attribute'=> 'Data Registrado',
                'value' => 'data_do_planteio',
                'format' => 'raw',
                'filter' =>DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'data_do_planteio',
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
                  'class' => 'kartik\grid\ActionColumn',
                  'template' => '{Produzir}{view}{update}{delete}',
                  'buttons' => [

                     'Produzir' => function($url, $model) {
                       if($model['status'] == 10){
                         return Html::a(
                           '<span class="btn btn-sm btn-success">Produzir<b class="fa fa-success"></b></span>',
                           ['producao/agricula', 'id' => $model['id']]
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
                'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Cultivos</h3>',
                'type'=>'success',
                'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Registrar Cultivo', ['create'], ['class' => 'btn btn-success']),
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
               'nome_do_planteio',
               /*[
                   'attribute' => 'Cultivo',
                   'value' => 'nome_do_planteio',
                   'filter' => Html::activeDropDownList(
                     $searchModel, 'nome_do_planteio', [Cultivo::find()->asArray()->all(),'nome_do_planteio'],
                     [
                       'class'=>'form-control','prompt' => 'Planteio'
                     ]
                   )
               ],*/
               [
                   'attribute'=>'Nome Agricultor',
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
               /*[
                 'attribute'=> 'Data Registrado',
                 'value' => 'data_do_planteio',
                 'format' => 'raw',
                 'filter' =>DatePicker::widget([
                     'model' => $searchModel,
                     'attribute' => 'data_do_planteio',
                     'pluginOptions' => [
                         'autoclose'=>true,
                         'format' => 'yyyy-m-d'
                     ]
                 ])
               ],*/
               'data_do_planteio',
               [
                   'class' => 'kartik\grid\BooleanColumn',
                   'attribute' => 'status',
                   'vAlign' => 'middle'
               ],
               [
                   'class' => 'yii\grid\ActionColumn',
                   'template' => '{Produzir}',
                   'buttons' => [

                      'Produzir' => function($url, $model) {
                        if($model['status'] == 10){
                          return Html::a(
                            '<span class="btn btn-sm btn-danger">Produzir<b class="fa fa-success"></b></span>',
                            ['producao/agricula', 'id' => $model['id']]
                          );
                        }
                      }
                   ]
               ],
             ],
             'panel' => [
                 'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Cultivos</h3>',
                 'type'=>'success',
                 'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Registrar Cultivo', ['create'], ['class' => 'btn btn-success']),
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

        <?php } ?>

</div>
