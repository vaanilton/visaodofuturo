<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\InformacaoContacto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="informacao-contacto-form" style="background-color: #D0DCE0;padding: 8px;font-size: 14px;
            font-family: Open Sans; letter-spacing:2px;
            vertical-align: baseline; line-height: 32px;
            font-style: negrito ;text-align: justify;">

    <?php $form = ActiveForm::begin(); ?>
    <div class="well" style="overflow: auto">
      <div class="x_title">
        <h2 style="text-align: center;font-size: 15px;">Informacoes Contacto</h2>
        <div class="clearfix"></div>
      </div>

      <div class="form-group col-sm-12   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($model, 'telefone')->textInput(['maxlength' => true]) ?>
      </div>

      <div class="form-group col-sm-12   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
      </div>

      <div class="form-group col-sm-12   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($model, 'localisacao')->textInput(['maxlength' => true]) ?>
      </div>

      <div class="form-group col-sm-12   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($model, 'hora_funcionamento')->textInput(['maxlength' => true]) ?>
      </div>
    </div>

      <div class="form-group">
          <?= Html::submitButton('<i class="glyphicon glyphicon-floppy-disk"></i> Salvar',['class' => 'btn btn-success']) ?>
      </div>

    <?php ActiveForm::end(); ?>

</div>
