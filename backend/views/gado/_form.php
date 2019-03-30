<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Fornecedor;
use backend\models\Regiao;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model backend\models\Gado */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gado-form" style="background-color: #D0DCE0;padding: 8px;font-size: 14px;
            font-family: Open Sans; letter-spacing:2px;
            vertical-align: baseline; line-height: 32px;
            font-style: negrito ;text-align: justify;">

    <?php $form = ActiveForm::begin(); ?>

    <div class="well" style="overflow: auto">
      <div class="x_title">
        <h2 style="text-align: center;font-size: 15px;">Informacoes Fornecedor</h2>
        <div class="clearfix"></div>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($model, 'id_fornecedor')->widget(Select2::className(), [
          'data' => ArrayHelper::map(Fornecedor::find()->all(),'id','nome'),
          'options' => ['placeholder' => 'Escolha um Agricultor', 'id' => 'catid'],
        ]);?>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($model, 'id_regiao')->widget(Select2::className(), [
          'data' => ArrayHelper::map(Regiao::find()->all(),'id','localidade'),
          'options' => ['placeholder' => 'Escolha Regiao', 'id' => 'catidd'],
        ]);?>
      </div>
    </div>

  <div class="well" style="overflow: auto">
    <div class="x_title">
      <h2 style="text-align: center;font-size: 15px;">Informacoes Gado</h2>
      <div class="clearfix"></div>
    </div>
    <div class="form-group col-sm-4   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
      <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="form-group col-sm-4   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
      <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="form-group col-sm-4   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
      <?= $form->field($model, 'quantidade')->textInput() ?>
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
