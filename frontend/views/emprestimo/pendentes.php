<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use kartik\date\DatePicker;
use frontend\models\Fornecedor;
use kop\y2sp\ScrollPager;
/* @var $this yii\web\View */
/* @var $searchModel app\models\EmprestimoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Emprestimos - Pendentes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emprestimo-index">

    <?php /*  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Emprestimo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'Fornecedor',
                'value'=>'fornecedor.nome'
            ],
            [
                'attribute'=>'Utilizador',
                'value'=>'utilizador.nome'
            ],
            [
              'attribute'=>'tipo',
              'value'=>'tipo',
              'filter' => Html::activeDropDownList(
                $searchModel, 'tipo',['Monetario'=>'Monetario', 'Produto'=>'Produto'],
                [
                  'class'=>'form-control','prompt' => 'tipo'
                ]
              )
            ],
            'descricao',
            'quantidade',
            'data',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);

    <div class="x_panel">
      <div class="row">
        <table class="table table-striped table-hover" >
          <thead>
            <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">Tipo Emprestimo</th>
            <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">Nome</th>
            <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">Quantidade</th>
            <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">Data Devolucao</th>
            <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">Data</th>
            <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">Total Devolucao</th>
          </thead>

            <?php
              if ($modelsemprestimo) {
                 $dados=0;
                  foreach ($modelsemprestimo as $key => $emprestimo) {
            ?>
                    <div class="col-md-4">
                      <tbody>
                        <tr class='clickable-row' data-href='<?= Url::to(['cultivo/view','id'=>$emprestimo['id']]); ?>'>
                          <td style="text-align: center;"><?= $emprestimo['tipo']; ?></td>

                          <?php if($emprestimo['nome'] != ''){ ?>
                            <td style="text-align: center;"><?= $emprestimo['nome']; ?></td>
                          <?php } else {?>
                          <td style="text-align: center;"><?= '--------------' ?></td>
                          <?php } ?>

                          <td style="text-align: center;"><?= $emprestimo['quantidade']; ?></td>
                          <td style="text-align: center;"><?= $emprestimo['data_devolucao']; ?></td>
                          <td style="text-align: center;"><?= $emprestimo['data']; ?></td>
                          <td style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;"><?= $emprestimo['quantidade_monetario'].' $00' ?></td>
                          <?php $dados = $dados + (int)$emprestimo['quantidade_monetario']?>

                        </tr>
                  <?php
                  }
                  ?>
                      </tbody>
                    </div>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <tbody>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="background-color: #E9EBEE;padding: 15px;text-align: center;font-size: 15px;">TOTAL</td>
                        <td style="background-color: #E9EBEE;padding: 15px;text-align: center;font-size: 15px;"><?= $dados.' $00' ?></td>
                      </tbody>
                  </table>
              <?php
              }
              ?>
      </div>

      <div class="row">
        <div class="col-md-12">
          <?php
            if($modelsemprestimo){
              echo LinkPager::widget([
                'pagination' => $pages,
              ]);
            }
          ?>
        </div>
      </div>
    </div>
    */?>

    <div class="emprestimo-index">

      <?= GridView::widget([
          'dataProvider' => $dataProvider,
          'filterModel' => $searchModel,
          'showPageSummary' => true,
          'columns' => [
              ['class' => 'kartik\grid\SerialColumn'],

              //'id',
              //'id_fornecedor',
              [
                  'attribute'=>'Fornecedor',
                  'value'=>function($data){
                    $fornecedor = Fornecedor::find()->where(['id'=>$data['id_fornecedor']])->One();
                    if($fornecedor){
                       return $fornecedor->nome.' '.$fornecedor->sobrenome;
                    }
                  },
                  'pageSummary' => 'Total',
                  'contentOptions' => [
                      'class' => 'text-center'
                   ]
              ],
              //'id_utilizador',
              //'tipo',
              [
                  'attribute'=>'Tipo',
                  'value'=>'tipo',
                  'filter' => Html::activeDropDownList(
                    $searchModel, 'tipo',['Equipamento'=>'Equipamento', 'Medicamento'=>'Medicamento', 'Produto'=>'Produto'],
                    [
                      'class'=>'form-control','prompt' => 'TIPO'
                    ]
                  )
              ],
              'nome',
              //'quantidade',
              [
                'attribute'=>'Quantidade',
                'value'=>'quantidade',
                'format' => ['decimal', 2],
                'pageSummary' => true,
              ],
              //'quantidade_monetario',
              [
                'attribute'=>'Total Monetario',
                'value'=>'quantidade_monetario',
                'format' => ['decimal', 2],
                'pageSummary' => true,
              ],
              //'data',

              'data_devolucao',
              /*[
                'attribute'=> 'Data Devolucao',
                'value' => 'data_devolucao',
                'format' => 'raw',
                'filter' =>DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'data_devolucao',
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy-m-d'
                    ]
                ])
              ],*/
              //'estado',
              [
                  'attribute'=>'Estado',
                  'value'=>'estado',
              ],
              [
                'attribute'=> 'Data Registrado',
                'value' => 'data',
                'format' => 'raw',
                'filter' =>DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'data',
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy-m-d'
                    ]
                ])
              ],
              [
                  'class' => 'kartik\grid\ActionColumn',
                  'template' => '{Imprimir}',
                  'buttons' => [
                    'Imprimir' => function($url, $model) {
                         return Html::a('<span class="btn btn-sm btn-success">
                                          <b class="glyphicon glyphicon-print"></b>
                                        </span>',
                                          [
                                            'fornecedor/imprimiremprestimo',
                                            'id' => $model['id']
                                          ],
                                          [
                                            'title' => 'View',
                                            'id' => 'modal-btn-view'
                                          ]);
                     },
                  ]
             ],
          ],
          'panel' => [
              'heading'=>'<h3 class="panel-title"><i class="fa fa-dollar"></i> Emprestimos</h3>',
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
      ]); ?>


    </div>
</div>
