<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\Parceiro;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\models\Item */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-form" style="background-color: #D0DCE0;padding: 8px;font-size: 14px;
            font-family: Open Sans; letter-spacing:2px;
            vertical-align: baseline; line-height: 32px;
            font-style: negrito ;text-align: justify;">

    <?php $form = ActiveForm::begin(); ?>

    <div class="well" style="overflow: auto">
      <div class="x_title">
        <h2 style="text-align: center;font-size: 15px;">Informações Do Item (Produto)</h2>
        <div class="clearfix"></div>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder">
        <?= $form->field($model, 'id_parceiro')->widget(Select2::className(), [
          'data' => ArrayHelper::map(Parceiro::find()->all(),'id','nome'),
          'options' => ['placeholder' => 'Escolha Parceiro (Fornecedor)', 'id' => 'catid'],
        ]);?>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder">
        <?= $form->field($model, 'codigo')->textInput(['placeholder'=>"Entre com o Codigo"]) ?>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder">
        <?= $form->field($model, 'nome')->textInput(['placeholder'=>"Degite Nome do Item"]) ?>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder">
        <?= $form->field($model, 'iva')->textInput(['placeholder'=>"Entre com o Valor da IVA"]) ?>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder">
        <?= $form->field($model, 'unidade_caixa')->textInput(['placeholder'=>"Quantidade por Caixa"]) ?>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder">
        <?= $form->field($model, 'unidade_caixa_iva')->textInput(['placeholder'=>"Quantidade por caixa com IVA"]) ?>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder">
        <?= $form->field($model, 'preco_caixa_iva')->textInput(['placeholder'=>"Preço por caixa com IVA"]) ?>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder">
        <?= $form->field($model, 'preco_item')->textInput(['placeholder'=>"Preço Item"]) ?>
      </div>
    </div>

    <div class="pull-right">
      <?= Html::submitButton('<i class="glyphicon glyphicon-floppy-disk"></i> Salvar',['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
