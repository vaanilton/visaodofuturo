<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Fornecedor;
use backend\models\Regiao;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use kartik\file\FileInput;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model backend\models\Cultivo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cultivo-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="well" style="overflow: auto">
      <div class="x_title">
        <h2 style="text-align: center;font-size: 15px;">Informacoes Fornecedor</h2>
        <div class="clearfix"></div>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($model, 'id_fornecedor')->widget(Select2::className(), [
          'data' => ArrayHelper::map(Fornecedor::find()->orderBy(['nome' => SORT_ASC])->all(),'id','nome'),
          'options' => ['placeholder' => 'Escolha um Agricultor', 'id' => 'catid'],
        ]);?>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($model, 'id_regiao')->widget(Select2::className(), [
          'data' => ArrayHelper::map(Regiao::find()->orderBy(['localidade' => SORT_ASC])->all(),'id','localidade'),
          'options' => ['placeholder' => 'Escolha Regiao', 'id' => 'catidd'],
        ]);?>
      </div>
    </div>

    <div class="well" style="overflow: auto">
      <div class="x_title">
        <h2 style="text-align: center;font-size: 15px;">Informacoes Cultivo</h2>
        <div class="clearfix"></div>
      </div>
      <div class="form-group col-sm-4   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($model, 'nome_do_planteio')->textInput(['maxlength' => true]) ?>
      </div>

      <div class="form-group col-sm-4   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>
      </div>

      <div class="form-group col-sm-4   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($model, 'tamanho_do_solu')->textInput() ?>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($model, 'data_do_planteio')->widget(DatePicker::classname(), [
          'options' => ['placeholder' => 'Enter birth date ...'],
          'pluginOptions' => [
              'autoclose'=>true
          ]
        ]);?>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($model, 'tempo_do_cultivo')->widget(Select2::className(), [
            'data' => [
              'Inverno' => 'Inverno',
              'Primavera' => 'Primavera',
              'Verao' => 'Verao',
              'Outono' => 'Outono',
            ],
            'options' => ['placeholder' => 'Escolha o Tempo do Cultivo...', 'multiple' => false],
            ]);
        ?>
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

    </div>

    <div class="form-group">
        <?= Html::submitButton('<i class="glyphicon glyphicon-floppy-disk"></i> Salvar',['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
