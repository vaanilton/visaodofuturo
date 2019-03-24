<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model backend\models\Produto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'preco')->textInput() ?>

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


    <div class="form-group">
        <?= Html::submitButton('<i class="glyphicon glyphicon-floppy-disk"></i> Salvar',['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
