<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model backend\models\IntervensaoSocial */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="intervensao-social-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="form-group col-sm-12 gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
      <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="form-group col-sm-12 gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
      <?= $form->field($model, 'descricao')->textarea(['rows' => 6]) ?>
    </div>

    <div class="form-group col-sm-12 gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
      <?= $form->field($model, 'photo')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'showUpload' => true,
            'allowedFileExtensions' => ['jpg','png','jpeg'],
            'initialPreview'=>[
                "$model->photo"
            ],
            'initialPreviewAsData'=>true,
            'initialCaption'=>"$model->photo",
            'initialPreviewConfig' => [
                ['caption' => "$model->photo", 'size' => '873727'],
            ],
            'overwriteInitial'=>true,
            'maxFileSize'=>2800
          ]
      ])?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
