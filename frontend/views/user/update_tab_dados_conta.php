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

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'currentPassword')->passwordInput() ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'password_confirm')->passwordInput() ?>

    <?= Html::submitButton('Update', ['class' => 'btn btn-lg btn-primary criar']) ?>

  </div>


  <?php ActiveForm::end(); ?>
