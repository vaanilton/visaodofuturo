<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use backend\models\Regiao;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\models\Cliente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliente-form" style="background-color: #D0DCE0;padding: 8px;font-size: 14px;
            font-family: Open Sans; letter-spacing:2px;
            vertical-align: baseline; line-height: 32px;
            font-style: negrito ;text-align: justify;">

    <?php $form = ActiveForm::begin(); ?>

    <div class="well" style="overflow: auto">
      <div class="x_title">
        <h2 style="text-align: center;font-size: 15px;">Informações Do Parceiro</h2>
        <div class="clearfix"></div>
      </div>

      <div class="form-group col-sm-12   gen-fields-holder">
        <?= $form->field($model, 'id_regiao')->widget(Select2::className(), [
          'data' => ArrayHelper::map(Regiao::find()->all(),'id','localidade'),
          'options' => ['placeholder' => 'Escolha Regiao', 'id' => 'catid'],
        ]);?>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder">
        <?= $form->field($model, 'nome')->textInput(['placeholder'=>"Degite Nome"]) ?>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder">
        <?= $form->field($model, 'sobrenome')->textInput(['placeholder'=>"Degite Sobrenome"]) ?>
      </div>

      <div class="form-group col-sm-4   gen-fields-holder">
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

      <div class="form-group col-sm-4   gen-fields-holder">
        <?= $form->field($model, 'sexo')->widget(Select2::className(), [
            'data' => [
              'Masculino' => 'Masculino',
              'Feminino' => 'Feminino'
            ],
            'options' => ['placeholder' => 'Escolha o sexo...', 'multiple' => false],
            ])->label('Sexo Fornecedor');
        ?>
      </div>

      <div class="form-group col-sm-4   gen-fields-holder">
        <?= $form->field($model, 'data_nascimento')->widget(DatePicker::classname(), [
          'options' => ['placeholder' => 'Entre com a Data de Nascimento ...'],
          'pluginOptions' => [
              'autoclose'=>true,
              'format' => 'yyyy-m-d'
          ]]);
        ?>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder">
        <?= $form->field($model, 'contacto')->textInput(['placeholder'=>"Degite o Contacto"]) ?>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder">
        <?= $form->field($model, 'email')->textInput(['placeholder'=>"Entre com o Email"]) ?>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder">
        <?= $form->field($model, 'bi')->textInput(['placeholder'=>"Numero de BI"]) ?>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder">
        <?= $form->field($model, 'nif')->textInput(['placeholder'=>"Numero de NIF"]) ?>
      </div>
    </div>
    <div class="pull-right">
      <?= Html::submitButton('<i class="glyphicon glyphicon-floppy-disk"></i> Salvar',['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
