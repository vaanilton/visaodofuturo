<?php
use yii\bootstrap\Nav;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>

<?php $form = ActiveForm::begin([
            // 'enableAjaxValidation' => true,
            'enableClientValidation' => true,
]); ?>

 <div class="form-group">

    <div class="form-group col-sm-12   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
      <?= $form->field($model, 'username') ?>
    </div>

    <div class="form-group col-sm-12   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
      <?= $form->field($model, 'email') ?>
    </div>

    <div class="form-group col-sm-12   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
      <?= $form->field($model, 'currentPassword')->passwordInput() ?>
    </div>

    <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
      <?= $form->field($model, 'password')->passwordInput() ?>
    </div>

    <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
      <?= $form->field($model, 'password_confirm')->passwordInput() ?>
    </div>

    <?= Html::submitButton('Update', ['class' => 'btn btn-lg btn-primary criar']) ?>

  </div>


  <?php ActiveForm::end(); ?>
