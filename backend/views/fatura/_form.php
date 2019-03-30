<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Fatura */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fatura-form" style="background-color: #D0DCE0;padding: 8px;font-size: 14px;
            font-family: Open Sans; letter-spacing:2px;
            vertical-align: baseline; line-height: 32px;
            font-style: negrito ;text-align: justify;">

    <?php $form = ActiveForm::begin(); ?>

    <div class="well" style="overflow: auto">

      <div class="form-group col-sm-12   gen-fields-holder">
        <?= $form->field($model, 'id_cliente')->textInput() ?>
      </div>

      <div class="form-group col-sm-12   gen-fields-holder">
        <?= $form->field($model, 'total_venda')->textInput(['maxlength' => true]) ?>
      </div>
    </div>

    <div class="form-group col-sm-3   gen-fields-holder">
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> Novo Produto', ['item/create'], ['class' => 'btn btn-primary']) ?>
    </div>

    <div class="form-group col-sm-3   gen-fields-holder">
        <?= Html::a('<i class="glyphicon glyphicon-user"></i> Novo Cliente', ['cliente/create'], ['class' => 'btn btn-primary']) ?>
    </div>

    <div class="form-group col-sm-3   gen-fields-holder">
        <?= Html::a('<i class="glyphicon glyphicon-search"></i> Adicionar + Produtos', ['item/create'], ['class' => 'btn btn-primary']) ?>
    </div>

    <div class="form-group col-sm-3   gen-fields-holder">
        <?= Html::submitButton('<i class="glyphicon glyphicon-print"></i> Salvar e Imprimir',['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
