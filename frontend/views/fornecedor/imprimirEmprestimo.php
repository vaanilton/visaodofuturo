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
use yii\widgets\DetailView;
use backend\models\Fornecedor;
/* @var $this yii\web\View */
/* @var $searchModel backend\mdels\FornecedorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fornecedors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fornecedor-index">
  <div class="col-xs-7 logo">

    <?php if($model){
      $fornecedor = Fornecedor::find()->where(['id'=>$model->id_fornecedor])->One();
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
      <?php }?>

        NUMERO BI - <?php echo $fornecedor->BI ?> <br>
        NUMERO NIF - <?php echo $fornecedor->NIF ?>

      </h3>
    <?php }?>

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
          //'id',
          //'id_fornecedor',
          //'id_utilizador',
          'tipo',
          'nome',
          'quantidade',
          'data',
          'data_devolucao',
          'quantidade_monetario',
          //'estado',
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
