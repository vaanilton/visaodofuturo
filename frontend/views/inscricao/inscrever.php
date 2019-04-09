<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\Url;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model backend\models\Inscricao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inscricao-form">

    <h3 class="tittle" style="background-color: #D0DCE0;padding: 18px;font-size: 20px;
                font-family: Open Sans; letter-spacing:2px;
                vertical-align: baseline;text-align: center;">
      <a href="<?= Url::to(['site/index']); ?>">
        <img src="../../img//logotipo.jpg" class="img-responsive zoom-img" alt="" width="150px" height="350px"/>
      </a>
      <span>Formulario de Inscrição</span>
    </h3>

    <?php if (Yii::$app->session->hasFlash('success')): ?>
      <div class="alert alert-success alert-dismissable">
         <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
         <h4><i class="icon fa fa-check"></i>Salvo!</h4>
         <?= Yii::$app->session->getFlash('success') ?>
       </div>
    <?php endif; ?>

    <?php if (Yii::$app->session->hasFlash('error')): ?>
      <div class="alert alert-danger alert-dismissable">
         <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
         <h4><i class="icon fa fa-check"></i>Saved!</h4>
         <?= Yii::$app->session->getFlash('error') ?>
       </div>
     <?php endif; ?>

    <?php $form = ActiveForm::begin(); ?>

    <div class="well" style="overflow: auto">
      <div class="x_title">
        <h2 style="text-align: center;font-size: 15px;"></h2>
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
            ])->label('Sexo');
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
        <?= $form->field($model, 'escolaridade')->widget(Select2::className(), [
            'data' => [
              'Médio' => 'Médio',
              'Superior' => 'Superior',
              'Pós-graduação' => 'Pós-graduação',
            ],
            'options' => ['placeholder' => 'Escolha o nivel de escolaridade...', 'multiple' => false],
            ])->label('Escolaridade');
        ?>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($model, 'BI')->textInput(['placeholder'=>"Numero BI"]) ?>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($model, 'NIF')->textInput(['placeholder'=>"Numero NIF"]) ?>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($model, 'telefone')->textInput(['placeholder'=>"Numero Celular"]) ?>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($model, 'email')->textInput(['placeholder'=>"Email"]) ?>
      </div>
      <div class="form-group col-sm-6 gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?php /*
        <?= $form->field($model, 'carta')->widget(FileInput::classname(), [
          'options' => ['accept' => 'pdf'],
          'pluginOptions' => [
              'showPreview' => false,
              'showCaption' => true,
              'showRemove' => true,
              'showUpload' => false
          ]
        ])->hint('Opcional')?>
      </div>
      <div class="form-group col-sm-6 gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($model, 'curiculum')->widget(FileInput::classname(), [
          'options' => ['accept' => 'pdf'],
          'pluginOptions' => [
              'showPreview' => false,
              'showCaption' => true,
              'showRemove' => true,
              'showUpload' => false
          ]
        ])->hint('Opcional')?>
        */ ?>
      </div>
    </div>

    <div class="form-group" style="background-color: #D0DCE0;padding: 18px;font-size: 20px;
                font-family: Open Sans; letter-spacing:2px;
                vertical-align: baseline;text-align: center;">
        <?= Html::submitButton('<i class="glyphicon glyphicon-floppy-disk"></i> Emviar Inscrição',['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
