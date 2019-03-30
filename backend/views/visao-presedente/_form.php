<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model backend\models\VisaoPresedente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="visao-presedente-form" style="background-color: #D0DCE0;padding: 8px;font-size: 14px;
            font-family: Open Sans; letter-spacing:2px;
            vertical-align: baseline; line-height: 32px;
            font-style: negrito ;text-align: justify;">

    <?php $form = ActiveForm::begin(); ?>
    <div class="well" style="overflow: auto">
      <div class="x_title">
        <h2 style="text-align: center;font-size: 15px;">Visao do Presedente</h2>
        <div class="clearfix"></div>
      </div>

      <div class="form-group col-sm-12   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>
      </div>

      <div class="form-group col-sm-12   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($model, 'sobrenome')->textInput(['maxlength' => true]) ?>
      </div>

      <div class="form-group col-sm-12   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($model, 'descricao')->textarea(['rows' => 6]) ?>
      </div>

      <div class="form-group col-sm-12   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
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
    </div>
    <div class="form-group">
        <?= Html::submitButton('<i class="glyphicon glyphicon-floppy-disk"></i> Salvar',['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
