<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Regiao;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use kartik\file\FileInput;
use kartik\select2\Select2;

$this->title = 'Registrar Agricultor';
$this->params['breadcrumbs'][] = ['label' => 'Fornecedors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="fornecedor-form">
  <h1><?= Html::encode($this->title) ?></h1>
    <div class="x_panel">
      <?php $form = ActiveForm::begin(); ?>
        <div class="row">

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
            <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
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

            <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
              <?= $form->field($model, 'id_regiao')->widget(Select2::className(), [
                'data' => ArrayHelper::map(Regiao::find()->all(),'id','descricao'),
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
            <div class="x_title">
              <h2 style="text-align: center;font-size: 15px;">Informacoes Login</h2>
              <div class="clearfix"></div>
            </div>
            <div class="form-group col-sm-4   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
              <?= $form->field($user, 'username')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="form-group col-sm-4   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
              <?= $form->field($user, 'email')->textInput(['maxlength' => true])?>
            </div>

            <div class="form-group col-sm-4   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
              <?= $form->field($user, 'password')->passwordInput() ?>
            </div>

            <div class="form-group col-sm-4   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
              <?= $form->field($user, 'password_confirm')->passwordInput() ?>
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
                    ]])
              ?>
            </div>
          </div>
        </div>

      <div class="form-group">
          <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
      </div>

      <?php ActiveForm::end(); ?>
    </div>
</div>
