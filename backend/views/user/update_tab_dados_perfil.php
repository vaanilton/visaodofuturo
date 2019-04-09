<?php
use yii\bootstrap\Nav;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use kartik\file\FileInput;
use kartik\select2\Select2;
use backend\models\Regiao;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
?>

<div class="form-group" style="background-color: #E9EBEE;padding: 18px;font-size: 16px;
                                font-family: Open Sans; letter-spacing:2px;
                                vertical-align: baseline; line-height: 32px;
                                font-style: negrito ;text-align: justify;">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <div class="form-group col-sm-4 gen-fields-holder">
      <?= $form->field($profile, 'nome') ?>
    </div>

    <div class="form-group col-sm-8 gen-fields-holder">
      <?= $form->field($profile, 'sobrenome') ?>
    </div>

    <div class="form-group col-sm-12 gen-fields-holder">
      <?= $form->field($profile, 'sexo')->widget(Select2::className(), [
          'data' => [
            'Masculino' => 'Masculino',
            'Feminino' => 'Feminino'
          ],
          'options' => ['placeholder' => 'Escolha o sexo...', 'multiple' => false],
          ])->label('Sexo Utilizador');
      ?>
    </div>

    <div class="form-group col-sm-6 gen-fields-holder">
      <?= $form->field($profile, 'data_nascimento')->widget(DatePicker::classname(), [
          'options' => ['placeholder' => 'Enter birth date ...'],
          'pluginOptions' => [
              'autoclose'=>true,
              'format' => 'yyyy-m-d'
          ]
      ]);?>
    </div>

    <div class="form-group col-sm-6 gen-fields-holder">
      <?= $form->field($profile, 'id_regiao')->widget(Select2::className(), [

        'data' => ArrayHelper::map(Regiao::find()->all(),'id','localidade'),
        'options' => ['placeholder' => 'Select Regiao', 'id' => 'catid'],

      ]);?>
    </div>

    <div class="form-group col-sm-6 gen-fields-holder">
      <?= $form->field($profile, 'endereco') ?>
    </div>

    <div class="form-group col-sm-6 gen-fields-holder">
      <?= $form->field($profile, 'telefone') ?>
    </div>

    <div style="text-align: center;">
      <?= Html::submitButton('<i class="glyphicon glyphicon-refresh"></i> Atualizar Dados',['class' => 'btn btn-primary']) ?>
    </div>
  </div>

  <?php ActiveForm::end(); ?>
