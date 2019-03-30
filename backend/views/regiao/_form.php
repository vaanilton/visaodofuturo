<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Regiao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="regiao-form" style="background-color: #D0DCE0;padding: 8px;font-size: 14px;
            font-family: Open Sans; letter-spacing:2px;
            vertical-align: baseline; line-height: 32px;
            font-style: negrito ;text-align: justify;">

    <?php $form = ActiveForm::begin(); ?>
      <div class="well" style="overflow: auto">
        <div class="x_title">
          <h2 style="text-align: center;font-size: 15px;">Informacoes Região</h2>
          <div class="clearfix"></div>
        </div>

        <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
          <?= $form->field($model, 'pais')->textInput(['placeholder'=>"Pais"]) ?>
        </div>

        <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
          <?= $form->field($model, 'cidade')->textInput(['placeholder'=>"Cidade"]) ?>
        </div>

        <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
          <?= $form->field($model, 'ilha')->textInput(['placeholder'=>"Ilha"]) ?>
        </div>

        <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
          <?= $form->field($model, 'municipio')->textInput(['placeholder'=>"Municipio"]) ?>
        </div>

        <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
          <?= $form->field($model, 'rua')->textInput(['placeholder'=>"Rua"]) ?>
        </div>

        <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
          <?= $form->field($model, 'localidade')->textInput(['placeholder'=>"Localidade"]) ?>
        </div>

        <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
          <?= $form->field($model, 'latitude')->textInput(['placeholder'=>"Latitude"]) ?>
        </div>

        <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
          <?= $form->field($model, 'longitude')->textInput(['placeholder'=>"Longitude"]) ?>
        </div>
      </div>

    <div class="form-group">
      <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
