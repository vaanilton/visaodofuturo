<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use frontend\assets\AppAsset;
use frontend\models\Regiao;
use frontend\models\Profile;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;
use frontend\models\Fornecedor;
use frontend\models\Cultivo;
use frontend\models\Gado;
/* @var $this yii\web\View */
/* @var $searchModel backend\mdels\FornecedorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fornecedors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fornecedor-index">
  <div class="col-xs-7 logo">

    <?php if($model){

      $gado = Gado::find()->where(['id'=>$model->id_gado])->One();

      $cultivo = Cultivo::find()->where(['id'=>$model->id_cultivo])->One();
      if($cultivo){

        $fornecedor = Fornecedor::find()->where(['id'=>$cultivo->id_fornecedor])->One();
        if($fornecedor){?>

        <h1>
          NOME: <?php echo $fornecedor->nome.' '.$fornecedor->sobrenome ?>
        </h1>

        <br>
        <br>
        <h3>
        <?php $regiao = Regiao::find()->where(['id'=>$fornecedor->id_regiao])->One();
          if($regiao){?>

            RESIDENCIA - <?php echo $regiao->localidade ?> <br>

        <?php }?>

        NUMERO BI - <?php echo $fornecedor->BI ?> <br>
        NUMERO NIF - <?php echo $fornecedor->NIF ?>

      </h3>

    <?php }}else if($gado){

      $fornecedor = Fornecedor::find()->where(['id'=>$gado->id_fornecedor])->One();
      if($fornecedor){?>

      <h1>
        NOME: <?php echo $fornecedor->nome.' '.$fornecedor->sobrenome ?>
      </h1>

      <br>
      <br>
      <h3>
      <?php $regiao = Regiao::find()->where(['id'=>$fornecedor->id_regiao])->One();
        if($regiao){?>

          RESIDENCIA - <?php echo $regiao->localidade ?> <br>

      <?php }?>

      NUMERO BI - <?php echo $fornecedor->BI ?> <br>
      NUMERO NIF - <?php echo $fornecedor->NIF ?>

    </h3>

    <?php }}
  }?>

  </div>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <?= DetailView::widget([
      'model' => $model,
      'attributes' => [
          'designacao',
          'tipo',
          'quantidade_producao',
          'quantidade_perda',
          'data_colheita',
          [
            'attribute'=>'Preco/kg',
            'value'=>function($data){
                return $data->preco_kilo.' $00';
            }
          ],
          [
            'attribute'=>'Total Faturado',
            'value'=>function($data){
                $quant = $data->quantidade_producao - $data->quantidade_perda;
                return $quant * $data->preco_kilo.' $00';
            }
          ],
      ],
  ]) ?>

  <br>
  <br>
  <br>
  <br>
  <br>
  <h3>
    Data: <?php echo date('Y-m-d') ?>
  </h3>
</div>
