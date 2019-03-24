<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model backend\models\Inscricao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inscricao-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="well" style="overflow: auto">
      <div class="x_title">
        <h2 style="text-align: center;font-size: 15px;">Informacoes Inscrição</h2>
        <div class="clearfix"></div>
      </div>

      <div class="form-group col-sm-12   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($model, 'nome')->textInput(['placeholder'=>"Anilton Midanda Moniz Pereira"]) ?>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($model, 'morada')->textInput(['placeholder'=>"Fazenda"]) ?>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($model, 'sexo')->widget(Select2::className(), [
            'data' => [
              'Masculino' => 'Masculino',
              'Feminino' => 'Feminino'
            ],
            'options' => ['placeholder' => 'Escolha o sexo...', 'multiple' => false],
            ])->label('Sexo')->textInput(['placeholder'=>"Masculino"]);
        ?>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($model, 'data_nascimento')->widget(DatePicker::classname(), [
          'options' => ['placeholder' => 'Enter birth date ...'],
          'pluginOptions' => [
              'autoclose'=>true,
              'format' => 'yyyy-m-d'
          ]]);
        ?>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($model, 'escolaridade')->textInput(['maxlength' => true]) ?>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($model, 'BI')->textInput() ?>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($model, 'NIF')->textInput() ?>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($model, 'telefone')->textInput() ?>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
      </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
