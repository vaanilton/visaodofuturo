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
<br>

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>


    <div class="form-group">
      <div class="form-group col-sm-4   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($profile, 'nome') ?>
      </div>

      <div class="form-group col-sm-8   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($profile, 'sobrenome') ?>
      </div>

      <div class="form-group col-sm-12   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($profile, 'sexo')->widget(Select2::className(), [
            'data' => [
              'Masculino' => 'Masculino',
              'Feminino' => 'Feminino'
            ],
            'options' => ['placeholder' => 'Escolha o sexo...', 'multiple' => false],
            ])->label('Sexo Utilizador');
        ?>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($profile, 'data_nascimento')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Enter birth date ...'],
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-m-d'
            ]
        ]);?>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($profile, 'id_regiao')->widget(Select2::className(), [

          'data' => ArrayHelper::map(Regiao::find()->all(),'id','localidade'),
          'options' => ['placeholder' => 'Select Regiao', 'id' => 'catid'],

        ]);?>
      </div>


      <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($profile, 'endereco') ?>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($profile, 'telefone') ?>
      </div>

      <div class="form-group col-sm-12   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= Html::submitButton('Update', ['class' => 'btn btn-lg btn-primary criar']) ?>
      </div>
    </div>

  <?php ActiveForm::end(); ?>
