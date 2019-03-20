<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use backend\assets\AppAsset;
use backend\models\Regiao;
use backend\models\Cultivo;
use backend\models\Gado;
use backend\models\Profile;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel backend\mdels\FornecedorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Fornecedors';
//$this->params['breadcrumbs'][] = $this->title;
$dados=0;
$dados1=0;
?>
<div class="fornecedor-index">

  <div class="well" style="overflow: auto">
    <div class="x_title">
      <h2 style="text-align: center;font-size: 15px;">Credito Debito</h2>
      <div class="clearfix"></div>
    </div>

    <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
      <table class="table table-striped table-hover">
        <thead>
          <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;"></th>
          <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">Credito/Producao</th>
          <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">quantidade/Kg</th>
          <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">Preco/Unid</th>
          <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">Total/Faturado</th>
        </thead>

          <?php
          if ($modelCredito) {
            foreach ($modelCredito as $key => $credito) {
          ?>
              <div class="col-md-4">
                <tbody>
                  <tr>
                    <td style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">
                      <?= $key = $key + 1 ?>
                    </td>
                    <td style="text-align: center;">
                      <?php
                        $cultivo = Cultivo::find()->where(['id'=>$credito['id_cultivo']])->One();
                        $gado = Gado::find()->where(['id'=>$credito['id_gado']])->One();
                      ?>
                      <?= $cultivo['nome_do_planteio']?> <?= $credito['designacao']; ?>
                    </td>

                    <td style="text-align: center;">
                      <?= $credito['quantidade_producao']; ?>
                    </td>

                    <td style="text-align: center;">
                      <?= $credito['preco_kilo'] ?> $00
                    </td>

                    <td style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">
                      <?= $credito['preco_kilo'] * $credito['quantidade_producao']?> $00
                      <?php $dados1 = $dados1 + ((int)$credito['preco_kilo'] * $credito['quantidade_producao'])?>
                    </td>
                  </tr>
                </tbody>
              </div>
            <?php
            }
            ?>
            <tbody>
            <td></td>
            <td></td>
            <td></td>
            <td style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">TOTAL</td>
            <td style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;"><?= $dados1.' $00' ?></td>
            </tbody>

          <?php
          }
          ?>
        </table>
      </div>

      <?php
        $arrayemprestimo_ = array();
      ?>

      <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <table class="table table-striped table-hover" >
          <thead>
            <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;"></th>
            <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">Debito</th>
            <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">Nome</th>
            <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">Quantidade</th>
            <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">Preço</th>
          </thead>

            <?php
              if ($modelsemprestimo) {

                 foreach ($modelsemprestimo as $key => $emprestimo) {
                 ?>
                  <div class="col-md-4">
                    <tbody>
                      <tr class='clickable-row' data-href='<?= Url::to(['cultivo/view','id'=>$emprestimo['id']]); ?>'>

                        <td style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">
                          <?= $key = $key + 1 ?>
                        </td>

                        <td style="text-align: center;">
                          <?= $emprestimo['tipo']; ?>
                        </td>

                        <?php if($emprestimo['nome'] != ''){ ?>
                          <td style="text-align: center;"><?= $emprestimo['nome']; ?></td>
                        <?php } else {?>
                        <td style="text-align: center;"><?= '--------------' ?></td>
                        <?php } ?>

                        <td style="text-align: center;"><?= $emprestimo['quantidade']; ?></td>
                        <td style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;"><?= $emprestimo['quantidade_monetario'].' $00' ?></td>
                        <?php $dados = $dados + (int)$emprestimo['quantidade_monetario']?>

                        </tr>
                        <?php

                        $arrayemprestimo_ [$key] =[
                          (int)$emprestimo['id']
                        ];

                        }
                        ?>

                    </tbody>
                  </div>

                  <tbody>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">TOTAL</td>
                    <td style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;"><?= $dados.' $00' ?></td>
                  </tbody>
                <?php
                }
                ?>
            </table>
          </div>

          <div class="form-group col-sm-12   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
            <table class="table table-striped table-hover" >
              <thead>
                <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;"></th>
                <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;"></th>
                <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;"></th>
                <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;"></th>
                <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">Total A Pagar</th>
                <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;"><?php echo $total = $dados1- $dados?> $00</th>
                <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">
                  <?= Html::a('Registrar Fecho', ['emprestimo/fecho'], [
                      'class' => 'btn btn-success ',
                      'data' => [
                          'confirm' => 'Are you sure you want to delete this item?',
                          'method' => 'post',
                      ],
                    ])
                  ?>
                </th>

              </thead>
            </table>
          </div>
</div>
