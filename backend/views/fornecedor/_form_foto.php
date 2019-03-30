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

  <div class="fornecedor-form" style="padding: 5px;font-size: 14px;
              font-family: Open Sans; letter-spacing:2px;
              vertical-align: baseline; line-height: 32px;
              font-style: negrito ;text-align: justify;">
      <?php $form = ActiveForm::begin(); ?>
        <div class="well" style="overflow: auto">
          <div class="x_title">
            <h2 style="text-align: center;font-size: 15px;">Informacoes Login</h2>
            <div class="clearfix"></div>
          </div>
          <div class="form-group col-sm-12   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
            <?= $form->field($user, 'username')->textInput(['maxlength' => true]) ?>
          </div>

          <div class="form-group col-sm-12   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
            <?= $form->field($user, 'currentPassword')->passwordInput(['placeholder'=>"Degita Atual Password"]) ?>
          </div>

          <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
            <?= $form->field($user, 'password')->passwordInput(['placeholder'=>"Degita Novo Password"]) ?>
          </div>

          <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
            <?= $form->field($user, 'password_confirm')->passwordInput(['placeholder'=>"Degita Password Novamente"]) ?>
          </div>
        </div>
        <div class="form-group col-sm-12 gen-fields-holder">
            <?= Html::submitButton('<i class="glyphicon glyphicon-refresh"></i> Atualizar Dados',['class' => 'btn btn-lg btn-primary']) ?>
        </div>

      <?php ActiveForm::end(); ?>
  </div>
