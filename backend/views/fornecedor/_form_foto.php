<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Regiao;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\Fornecedor */
/* @var $form yii\widgets\ActiveForm */
?>

  <div class="fornecedor-form">
      <?php $form = ActiveForm::begin(); ?>
        <div class="well" style="overflow: auto">
          <div class="x_title">
            <h2 style="text-align: center;font-size: 15px;">Informacoes Login</h2>
            <div class="clearfix"></div>
          </div>
          <div class="form-group col-sm-4   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
            <?= $form->field($user, 'username')->textInput(['maxlength' => true]) ?>
          </div>

          <div class="form-group col-sm-4   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
            <?= $form->field($user, 'password')->passwordInput() ?>
          </div>

          <div class="form-group col-sm-4   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
            <?= $form->field($user, 'password_confirm')->passwordInput() ?>
          </div>
        </div>
      <div class="form-group">
          <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
      </div>

      <?php ActiveForm::end(); ?>
  </div>