<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
/* @var $searchModel app\models\EmprestimoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Emprestimo - Estrato';
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
    ]); */?>

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
                        <td style="background-color: #E9EBEE;padding: 15px;text-align: center;font-size: 15px;">Total</td>
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
</div>
