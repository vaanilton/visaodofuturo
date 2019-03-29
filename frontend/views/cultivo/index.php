<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use frontend\models\Fornecedor;
use frontend\models\Cultivo;
use frontend\models\Gado;
use frontend\models\Regiao;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use frontend\models\ProducaoSearch;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kop\y2sp\ScrollPager;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CultivoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cultivos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cultivo-index">

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

              $searchModel->id_cultivo = $model['id'];
              $dataProvider = $searchModel->search(Yii::$app->request->queryParams, 'cultivo');


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
            'attribute'=>'Nome Agricultor',
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
             'filter' => Html::activeDropDownList($searchModel, 'id_regiao',ArrayHelper::map(
                 Regiao::find()->asArray()->all(), 'id', 'descricao'),
                 [
                   'class'=>'form-control','prompt' => 'Selecionar Regiao'
                 ]
               ),
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
        ],
        /*[
            'class' => 'kartik\grid\BooleanColumn',
            'attribute' => 'status',
            'vAlign' => 'middle'
        ],*/
        [
          'class' => 'kartik\grid\CheckboxColumn',
          'headerOptions' => ['class' => 'kartik-sheet-style'],
        ],

      ],
      'panel' => [
          'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Cultivos</h3>',
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

    <?php /* echo $this->render('_search', ['model' => $searchModel]);
    <div class="col-md-3">
      <p>
          <?= Html::a('Create Cultivo', ['create'], ['class' => 'btn btn-success']) ?>
      </p>
    </div>

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
            <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">Foto</th>
            <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">Nome</th>
            <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">Nome da Plantacao</th>
            <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">Regiao</th>
            <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">Data do Planteio</th>
            <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">Amplitude Solo (m²)</th>
            <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">Data Resgistrado</th>
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
                                <td style="text-align: center;">
                                  <a href="<?= Url::to(['cultivo/view','id'=>$cultivo['id']]); ?>" class="image-popup" title="">
                                    <img height="60px" width="60px" src="<?php echo Yii::getAlias('@web').'/'.$cultivo['photo'] ?>" class="thumb-img" title="<?= $cultivo['nome_do_planteio']; ?>" alt="<?= $cultivo['nome_do_planteio']; ?>" width="230" height='230'>
                                  </a>
                                </td>

                                <td style="text-align: center;">
                                  <?= $fornecedor['nome']; ?> <br>
                                  <?= $fornecedor['sobrenome']; ?>
                                </td>
                              <?php
                                }
                              }
                              ?>

                              <td style="text-align: center;"><?= $cultivo['nome_do_planteio']; ?> <br>
                                <?= $cultivo['descricao']; ?>
                              </td>

                            <?php
                              $modelsRegiao = Regiao::find()->where(['id'=>$cultivo['id_regiao']])->all();
                              if ($modelsRegiao) {
                                foreach ($modelsRegiao as $key => $regiao) {
                                ?>

                                  <td style="text-align: center;">
                                    <?= $regiao['descricao']; ?>
                                  </td>

                              <?php
                                }
                              }
                              ?>

                              <td style="text-align: center;"><?= $cultivo['data_do_planteio']; ?></td>
                              <td style="text-align: center;"><?= $cultivo['tamanho_do_solu'].' (m²)'; ?></td>
                              <td style="text-align: center;"><?= $cultivo['data_registro']; ?></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                      </div>
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
</div>
