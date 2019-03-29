<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use backend\assets\AppAsset;
use backend\models\Regiao;
use backend\models\Profile;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kop\y2sp\ScrollPager;
/* @var $this yii\web\View */
/* @var $searchModel backend\mdels\FornecedorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fornecedors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fornecedor-index">

  <div class="col-md-2">

  </div>

  <?php
    $id = Yii::$app->user->identity->id;
    $profile = Profile::find()->where(['user_iduser' => $id])->One();
  ?>

  <div class="col-md-10">
    <div class="title_right">
      <div class="col-md-5 col-sm-12 col-xs-12 form-group pull-right top_search">
        <div class="input-group">
          <?php $form = ActiveForm::begin(['action' => ['index'],'method' => 'get',]); ?>
            <div class="col-sm-8">
              <?= $form->field($searchModel, 'BI')
                ->label(false)
                ->textInput(['placeholder' => "Entre com o BI...",'type' => "text", 'class' => "form-control"])
              ?>
            </div>
              <span class="input-group-btn">
                <?= Html::submitButton('Search', ['class' => 'btn btn-default', 'type'=>"Search"]) ?>
              </span>
          <?php ActiveForm::end(); ?>
        </div>
      </div>
    </div>
  </div>


  <div class="x_panel">
    <div class="row">

      <?php if($profile->tipo == 'Adiministrador' || $profile->tipo == 'Gestor'){ ?>

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
              //'nome',
              [
                'label'=>'Nome',
                'value'=>function($data){
                  return $data->nome.' '.$data->sobrenome;
                }
              ],
              //'sobrenome',
              'BI',
              'NIF',
              [
                'attribute' =>'sexo',
                'value'=>function($data){
                  if($data->sexo == 'Masculino')
                    return 'Masculino';
                  else if($data->sexo == 'Feminino')
                    return 'Feminino';
                },
                'filter' => Html::activeDropDownList(
                  $searchModel, 'sexo',['Masculino'=>'Masculino', 'Feminino'=>'Feminino'],
                  [
                    'class'=>'form-control','prompt' => 'Sexo'
                  ]
                ),
                'contentOptions' => [
      			          'class' => 'text-center'
      			    ]
              ],
              [
                'attribute'=>'tipo',
                'value'=>'tipo',
                'filter' => Html::activeDropDownList(
                  $searchModel, 'tipo',['Agricultor'=>'Agricultor', 'Pastor'=>'Pastor', 'Agricultor-Pastor'=>'Agricultor-Pastor'],
                  [
                    'class'=>'form-control','prompt' => 'tipo'
                  ]
                ),
                'contentOptions' => [
      			          'class' => 'text-center'
      			    ]
              ],
              [
                 'attribute'=>'Regiao',
        				 'value'=>'regiao.localidade',
                        //'filter'=>array("1"=>"open","2"=>"in progress","3"=>"closed")
        				 'filter' => Html::activeDropDownList($searchModel, 'id_regiao',ArrayHelper::map(
                     Regiao::find()->asArray()->all(), 'id', 'localidade'),
                     ['class'=>'form-control','prompt' => 'Selecionar Regiao']
                   ),
                   'contentOptions' => [
         			          'class' => 'text-center'
         			    ]
        			],
              [
                'attribute' =>'status',
                'value'=>function($data){
                  if($data->status == '0')
                    return 'Desativado';
                  else if($data->status == '10')
                    return 'Activo';
                },
                'filter' => Html::activeDropDownList(
                  $searchModel, 'status',['10'=>'Activo', '0'=>'Desativado'],
                  [
                    'class'=>'form-control','prompt' => 'Estado'
                  ]
                ),
                'contentOptions' => [
      			          'class' => 'text-center'
      			    ]
              ],
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
                               'confirm' => 'Tem certeza que pretende eliminar este Colaborador.',
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
                'heading'=>'<h3 class="panel-title"><i class="fa fa-group"></i> Fornecedores</h3>',
                'type'=>'success',
                'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Cadastrar Fornecedor', ['create'], ['class' => 'btn btn-success']),
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
              'sobrenome',
              'BI',
              'NIF',
              [
                'attribute' =>'sexo',
                'value'=>function($data){
                  if($data->sexo == 'Masculino')
                    return 'Masculino';
                  else if($data->sexo == 'Feminino')
                    return 'Feminino';
                },
                'filter' => Html::activeDropDownList(
                  $searchModel, 'sexo',['Masculino'=>'Masculino', 'Feminino'=>'Feminino'],
                  [
                    'class'=>'form-control','prompt' => 'Sexo'
                  ]
                ),
                'contentOptions' => [
                      'class' => 'text-center'
                ]
              ],
              [
                'attribute'=>'tipo',
                'value'=>'tipo',
                'filter' => Html::activeDropDownList(
                  $searchModel, 'tipo',['Agricultor'=>'Agricultor', 'Pastor'=>'Pastor'],
                  [
                    'class'=>'form-control','prompt' => 'tipo'
                  ]
                ),
                'contentOptions' => [
                      'class' => 'text-center'
                ]
              ],
              [
                 'attribute'=>'Regiao',
                 'value'=>'regiao.localidade',
                        //'filter'=>array("1"=>"open","2"=>"in progress","3"=>"closed")
                 'filter' => Html::activeDropDownList($searchModel, 'id_regiao',ArrayHelper::map(
                     Regiao::find()->asArray()->all(), 'id', 'localidade'),
                     ['class'=>'form-control','prompt' => 'Selecionar Regiao']
                   ),
                   'contentOptions' => [
                        'class' => 'text-center'
                  ]
              ],
              [
                'attribute' =>'status',
                'value'=>function($data){
                  if($data->status == '0')
                    return 'Desativado';
                  else if($data->status == '10')
                    return 'Activo';
                },
                'filter' => Html::activeDropDownList(
                  $searchModel, 'status',['10'=>'Activo', '0'=>'Desativado'],
                  [
                    'class'=>'form-control','prompt' => 'Estado'
                  ]
                ),
                'contentOptions' => [
                      'class' => 'text-center'
                ]
              ]
            ],
            'panel' => [
                'heading'=>'<h3 class="panel-title"><i class="fa fa-group"></i> Fornecedores</h3>',
                'type'=>'success',
                'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Cadastrar Fornecedor', ['create'], ['class' => 'btn btn-success']),
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

      <?php }else if($profile->tipo == 'Fiel_Armazen'){} ?>

    </div>
    <?php /*
        <div class="row">
          <div class="col-md-12">
            <div class="x_panel">
              <div class="x_content">
                <div class="row">
                  <?php
                    if ($modelsFornecedor) {
                        foreach ($modelsFornecedor as $key => $fornecedor) {
                              ?>
                              <div class="col-md-4 col-sm-4 col-xs-12 well profile_view">
                                  <div class="gal-detail thumb">
                                      <a href="<?= Url::to(['fornecedor/update','id'=>$fornecedor['id']]); ?>" class="image-popup" title="">
                                          <img src="<?php echo Yii::getAlias('@web').'/'.$fornecedor['photo'] ?>" class="thumb-img" title="<?= $fornecedor['nome']; ?>" alt="<?= $fornecedor['nome']; ?>" width="230" height='230'>
                                      </a>
                                      <h4 class="text-center"><?= $fornecedor['nome']; ?></h4>
                                      <div class="ga-border"></div>
                                      <p class="text-muted text-center"><small><?= $fornecedor['tipo']; ?></small></p>
                                      <ul class="list-unstyled">
                                        <li><i class="fa fa-building"></i> Localidade: <?= $fornecedor['endereco']; ?></li>
                                        <li><i class="fa fa-phone"></i> Telefone #: <?= $fornecedor['telefone']; ?></li>
                                      </ul>
                                      <div class="btn-group">
                                        <a href="#" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        </a>
                                          <div class="col-xs-12 bottom text-center">
                                            <div class="col-xs-10 col-sm-6 emphasis">
                                              <a href="<?= Url::to(['fornecedor/update','id'=>$fornecedor['id']]); ?>">
                                                  <i class="fa fa-edit"></i>&nbsp;
                                                  <span>Edit</span>
                                              </a>
                                            </div>
                                            <div class="col-xs-10 col-sm-6 emphasis">
                                              <a href="<?= Url::to(['fornecedor/apagar','id'=>$fornecedor['id']]); ?>" data-confirm="Tem a certeza que pretende apagar este user?" data-method="post">
                                                  <i class="fa fa-trash"></i>&nbsp;
                                                  <span>Delete</span>
                                              </a>
                                            </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <?php
                          }
                      }
                  ?>
                </div>
              </div>
            </div>
          </div>


          <table class="table table-striped table-hover">
              <thead>
                  <th>Foto</th>
                  <th>Nome</th>
                  <th>Sobrenome</th>
                  <th>Sexo</th>
                  <th>BI</th>
                  <th>NIF</th>
                  <th>Tipo</th>
                  <th>Endereco</th>
                  <th>Contacto</th>
                  <th>Data Cadastrado</th>
                  <th>Editar</th>
                  <th>Apagar</th>
              </thead>
                <?php
                  if ($modelsFornecedor) {

                        foreach ($modelsFornecedor as $key => $fornecedor) {
                ?>
                          <div class="col-md-4">
                            <tbody>

                              <a href="<?= Url::to(['fornecedor/view','id'=>$fornecedor['id']]); ?>" class="image-popup" title="">
                                <tr>

                                  <td>
                                    <a href="<?= Url::to(['fornecedor/view','id'=>$fornecedor['id']]); ?>" class="image-popup" title="">
                                        <img height="60px" width="60px" src="<?php echo Yii::getAlias('@web').'/'.$fornecedor['photo'] ?>" class="thumb-img" title="<?= $fornecedor['nome']; ?>" alt="<?= $fornecedor['nome']; ?>" width="230" height='230'>
                                    </a>
                                  </td>

                                  <td>
                                    <?= $fornecedor['nome']; ?>
                                  </td>

                                  <td>
                                    <?= $fornecedor['sobrenome']; ?>
                                  </td>

                                  <td>
                                    <?= $fornecedor['sexo']; ?>
                                  </td>

                                  <td>
                                    <?= $fornecedor['bi']; ?>
                                  </td>

                                  <td>
                                    <?= $fornecedor['nif']; ?>
                                  </td>

                                  <td>
                                    <?= $fornecedor['tipo']; ?>
                                  </td>

                                  <td>
                                    <?= $fornecedor['endereco']; ?>
                                  </td>

                                  <td>
                                    <?= $fornecedor['telefone']; ?>
                                  </td>

                                  <td>
                                    <?= $fornecedor['data_registo']; ?>
                                  </td>

                                  <td>
                                    <?= Html::a('', ['update', 'id' => $fornecedor['id']], [
                                        'class' => 'btn btn-primary fa fa-edit'
                                    ]) ?>
                                  </td>

                                  <td>
                                    <?= Html::a('', ['apagar', 'id' => $fornecedor['id']], [
                                        'class' => 'btn btn-danger fa fa-trash-o',
                                        'data' => [
                                            'confirm' => 'Are you sure you want to delete this item?',
                                            'method' => 'post',
                                        ],
                                    ]) ?>
                                  </td>
                                </tr>
                              </a>
                            </tbody>
                          </div>
                      <?php
                        }
                      ?>

                      <th>Foto</th>
                      <th>Nome</th>
                      <th>Sobrenome</th>
                      <th>Sexo</th>
                      <th>BI</th>
                      <th>NIF</th>
                      <th>Tipo</th>
                      <th>Endereco</th>
                      <th>Contacto</th>
                      <th>Data Cadastrado</th>
                      <th>Editar</th>
                      <th>Apagar</th>

                      </table>
                  <?php
                  }
                  ?>


        <?= GridView::widget([
          'dataProvider' => $dataProvider,
          'filterModel' => $searchModel,
          'columns' => [
              ['class' => 'yii\grid\SerialColumn'],

              ['label'=>'Photo',
              'format'=>'html',
              'value'=>function($data){
                return Html::img(Yii::getAlias('@web').'/'.$data->photo,[
                  'width'=>'80px'
                ]);
              }],
              'nome',
              'sobrenome',
              //'imagem:image',
              'sexo',
              [
                'attribute' =>'status',
                'value'=>function($data){
                  if($data->status == '0')
                    return 'Desativado';
                  else if($data->status == '10')
                    return 'Activo';
                },
                'filter' => Html::activeDropDownList(
                  $searchModel, 'status',['10'=>'Activo', '0'=>'Desativado'],
                  [
                    'class'=>'form-control','prompt' => 'Estado'
                  ]
                )
              ],

              [
                'attribute'=>'tipo',
                'value'=>'tipo',
                'filter' => Html::activeDropDownList(
                  $searchModel, 'tipo',['tipo=Agricultor'=>'Agricultor', 'tipo=Pastor'=>'Pastor'],
                  [
                    'class'=>'form-control','prompt' => 'tipo'
                  ]
                )
              ],

              // 'is_destaque',
              // 'data_log',


              ['class' => 'yii\grid\ActionColumn']
          ],
        ]); ?>
        </div>
    */ ?>
  </div><br>
</div>
