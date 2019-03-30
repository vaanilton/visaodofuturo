<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Regiao;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use kartik\file\FileInput;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form" style="background-color: #D0DCE0;padding: 8px;font-size: 14px;
            font-family: Open Sans; letter-spacing:2px;
            vertical-align: baseline; line-height: 32px;
            font-style: negrito ;text-align: justify;">

    <?php $form = ActiveForm::begin([
        'id' => 'form-signup',
        'options' => ['enctype' => 'multipart/form-data'],
        //'enableAjaxValidation' => true,
        'enableClientValidation' => true,
    ]); ?>

      <div class="well" style="overflow: auto">
        <div class="x_title">
          <h2 style="text-align: center;font-size: 15px;">Informacoes Pessoais</h2>
          <div class="clearfix"></div>
        </div>

        <div class="form-group col-sm-4   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
          <?= $form->field($modelProfile, 'nome')->textInput(['placeholder'=>"Nome"])?>
        </div>

        <div class="form-group col-sm-4   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
          <?= $form->field($modelProfile, 'sobrenome')->textInput(['placeholder'=>"sobrenome"]) ?>
        </div>

        <div class="form-group col-sm-4   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
          <?= $form->field($modelProfile, 'data_nascimento')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Enter birth date ...'],
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-m-d'
            ]]);
          ?>
        </div>

        <div class="form-group col-sm-4   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
          <?= $form->field($modelProfile, 'sexo')->widget(Select2::className(), [
              'data' => [
                'Masculino' => 'Masculino',
                'Feminino' => 'Feminino'
              ],
              'options' => ['placeholder' => 'Escolha o sexo...', 'multiple' => false],
              ])->label('Sexo Utilizador');
          ?>
        </div>

        <div class="form-group col-sm-4   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
          <?= $form->field($modelProfile, 'telefone')->textInput(['placeholder'=>"Degite o numero Telefone"]) ?>
        </div>

        <div class="form-group col-sm-4   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
          <?= $form->field($modelProfile, 'endereco')->textInput(['placeholder'=>"Insira o endereco"]) ?>
        </div>

        <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
          <?= $form->field($modelProfile, 'id_regiao')->widget(Select2::className(), [
            'data' => ArrayHelper::map(Regiao::find()->all(),'id','localidade'),
            'options' => ['placeholder' => 'Escolha Regiao', 'id' => 'catid'],
          ]);?>
        </div>
        <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
          <?= $form->field($modelProfile, 'tipo')->widget(Select2::className(), [
              'data' => [
                'Adiministrador' => 'Adiministrador',
                'Gestor' => 'Gestor',
                'Operador' => 'Operador',
                'Fiel_armazen' => 'Fiel_armazen',
                'Fornecedores' => 'Fornecedores',
                'Agente-Venda' => 'Agente-Venda',
              ],
              'options' => ['placeholder' => 'Escolha o tipo de Utilizador...', 'multiple' => false],
              ])->label('Tipo Utilizador');
            ?>
        </div>
      </div>

      <div class="well" style="overflow: auto">
        <div class="x_title">
          <h2 style="text-align: center;font-size: 15px;">Informacoes Login</h2>
          <div class="clearfix"></div>
        </div>

        <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
          <?= $form->field($model, 'username')->textInput(['placeholder'=>"crie um username"])?>
        </div>

        <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
          <?= $form->field($model, 'email')->textInput(['placeholder'=>"Insira um email valido"])?>
        </div>

        <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
          <?= $form->field($model, 'password')->passwordInput(['placeholder'=>"Crie um Password"]) ?>
        </div>

        <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
          <?= $form->field($model, 'password_confirm')->passwordInput(['placeholder'=>"Introduza novamente a password"]) ?>
        </div>

        <div class="form-group col-sm-12   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
          <?= $form->field($modelProfile, 'photo')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => [
                'showUpload' => true,
                'allowedFileExtensions' => ['jpg','png','jpeg'],
                'initialPreview'=>[
                    "$modelProfile->photo"
                ],
                'initialPreviewAsData'=>true,
                'initialCaption'=>"$modelProfile->photo",
                'initialPreviewConfig' => [
                    ['caption' => "$modelProfile->photo", 'size' => '873727'],
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
