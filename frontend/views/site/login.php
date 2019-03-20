<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$fieldOptions1 = [
    'options' => ['class' => 'input100'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'input100'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

<html lang="pt">
<body>

	<div class="limiter">
		<div class="container-login100">
      <div class="col-xs-7 logo">
				<h1>
					<a href="<?= Url::to(['site/inicial']); ?>">
            <img src="../../img//logotipo.jpg" class="img-responsive zoom-img" alt="" width="150px" height="350px"/>
          </a>
				</h1>
			</div>
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(../../img//bg-01.jpg);">
					<span class="login100-form-title-1">
						...Um Passo a Futuro
					</span>
				</div>
        <br>
        <br>

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false, 'class'=>"login100-form validate-form"]); ?>
          <?= $form
              ->field($model, 'username', $fieldOptions2)
              ->label(false)
              ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>
          <br>
          <?= $form
              ->field($model, 'password', $fieldOptions2)
              ->label(false)
              ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>
          <br>

            <div class="col-md-6 col-sm-8 col-xs-12">
              <?= $form->field($model, 'rememberMe')->checkbox() ?>

              <br>
            </div>
              <!-- /.col -->
              <div class="container-login100-form-btn">
                  <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block btn-flat login100-form-btn', 'name' => 'login-button']) ?>
              </div>
              <!-- /.col -->
              <br>
              <div>
  							<a href="<?= Url::to(['site/request-password-reset']); ?>" class="txt1">
  								Esqueceu a palavra passe?
  							</a>
    					</div>

        <?php ActiveForm::end(); ?>
			</div>
		</div>
	</div>

</body>
</html>
