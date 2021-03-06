<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Regiao;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;
use kartik\date\DatePicker;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model backend\models\Fornecedor */
/* @var $form yii\widgets\ActiveForm */
?>

  <div class="fornecedor-form" style="background-color: #D0DCE0;padding: 8px;font-size: 14px;
              font-family: Open Sans; letter-spacing:2px;
              vertical-align: baseline;
              font-style: negrito ;text-align: justify;">
      <?php $form = ActiveForm::begin(); ?>
        <div class="row" style="padding: 5px;font-size: 14px;
                    font-family: Open Sans; letter-spacing:2px;
                    vertical-align: baseline;
                    font-style: negrito ;text-align: justify;">

          <div class="well" style="overflow: auto">
            <div class="x_title">
              <h2 style="text-align: center;font-size: 15px;">Informacoes Pessoais</h2>
              <div class="clearfix"></div>
            </div>

            <div class="form-group col-sm-4   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
              <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="form-group col-sm-4   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
              <?= $form->field($model, 'sobrenome')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="form-group col-sm-4   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
              <?= $form->field($model, 'data_nascimento')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Enter birth date ...'],
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-m-d'
                ]]);
              ?>
            </div>

            <div class="form-group col-sm-4   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
              <?= $form->field($model, 'BI')->textInput() ?>
            </div>

            <div class="form-group col-sm-4   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
              <?= $form->field($model, 'NIF')->textInput() ?>
            </div>

            <div class="form-group col-sm-4   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
              <?= $form->field($model, 'contacto')->textInput() ?>
            </div>

            <div class="form-group col-sm-12   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
              <?= $form->field($model, 'sexo')->widget(Select2::className(), [
                  'data' => [
                    'Masculino' => 'Masculino',
                    'Feminino' => 'Feminino'
                  ],
                  'options' => ['placeholder' => 'Escolha o sexo...', 'multiple' => false],
                  ])->label('Sexo Fornecedor');
              ?>
            </div>
          </div>

          <div class="well" style="overflow: auto">
            <div class="x_title">
              <h2 style="text-align: center;font-size: 15px;">Informacoes Adicionais</h2>
              <div class="clearfix"></div>
            </div>
            <div class="form-group col-sm-4   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
              <?= $form->field($model, 'estado_civil')->widget(Select2::className(), [
                  'data' => [
                    'Solteiro' => 'Solteiro',
                    'Casado' => 'Casado',
                    'Divorciado' => 'Divorciado'
                  ],
                  'options' => ['placeholder' => 'Escolha o Estado Civil...', 'multiple' => false],
                  ])->label('Estado Civil');
              ?>
            </div>

            <div class="form-group col-sm-4   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
              <?= $form->field($model, 'tipo')->widget(Select2::className(), [
                  'data' => [
                    'Agricultor' => 'Agricultor',
                    'Pastor' => 'Pastor',
                    'Agricultor-Pastor' => 'Agricultor-Pastor'
                  ],
                  'options' => ['placeholder' => 'Escolha o Tipo Fornecedor...', 'multiple' => false],
                  ])->label('Tipo Fornecedor');
              ?>
            </div>

            <div class="form-group col-sm-4   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
              <?= $form->field($model, 'id_regiao')->widget(Select2::className(), [
                'data' => ArrayHelper::map(Regiao::find()->all(),'id','localidade'),
                'options' => ['placeholder' => 'Escolha Regiao', 'id' => 'catid'],
              ]);?>
            </div>

            <div class="form-group col-sm-4   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
              <?= $form->field($model, 'endereco')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="form-group col-sm-4   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
              <?= $form->field($model, 'numero_agregado')->textInput() ?>
            </div>

            <div class="form-group col-sm-4   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
              <?= $form->field($model, 'grau_parentesco')->textInput(['maxlength' => true]) ?>
            </div>
          </div>

          <div class="well" style="overflow: auto">
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
                    ]])
              ?>
            </div>
          </div>
        </div>

        <div class="form-group col-sm-12 gen-fields-holder">
            <?= Html::submitButton('<i class="glyphicon glyphicon-refresh"></i> Atualizar Dados',['class' => 'btn btn-primary']) ?>
        </div>

      <?php ActiveForm::end(); ?>

</div>
