<?php
use yii\bootstrap\Nav;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>

<?php $form = ActiveForm::begin([
            // 'enableAjaxValidation' => true,
            'enableClientValidation' => true,
]); ?>

 <div class="form-group" style="background-color: #E9EBEE;padding: 18px;font-size: 16px;
             font-family: Open Sans; letter-spacing:2px;
             vertical-align: baseline; line-height: 32px;
             font-style: negrito ;text-align: justify;">

    <div class="form-group col-sm-12   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
      <?= $form->field($model, 'username')->textInput(['placeholder'=>"Username"]) ?>
    </div>

    <div class="form-group col-sm-12   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
      <?= $form->field($model, 'email')->textInput(['placeholder'=>"Email"]) ?>
    </div>

    <div class="form-group col-sm-12   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
      <?= $form->field($model, 'currentPassword')->passwordInput(['placeholder'=>"Degita Atual Password"]) ?>
    </div>

    <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
      <?= $form->field($model, 'password')->passwordInput(['placeholder'=>"Novo Password"]) ?>
    </div>

    <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
      <?= $form->field($model, 'password_confirm')->passwordInput(['placeholder'=>"Confirmar Password"]) ?>
    </div>

    <?= Html::submitButton('Update', ['class' => 'btn btn-lg btn-primary criar']) ?>

  </div>

  <?php ActiveForm::end(); ?>
