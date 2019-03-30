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

<div class="fornecedor-form" >
  <div class="x_panel">
      <?php $form = ActiveForm::begin(); ?>
        <div class="row">
          <div class="col-md-6">
              <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>
              <?= $form->field($model, 'sobrenome')->textInput(['maxlength' => true]) ?>

              <?= $form->field($model, 'estado_civil')->widget(Select2::className(), [
                  'data' => [
                    'Solteiro' => 'Solteiro',
                    'Casado' => 'Casado',
                    'Divorciado' => 'Divorciado'
                  ],
                  'options' => ['placeholder' => 'Escolha o Estado Civil...', 'multiple' => false],
                  ])->label('Estado Civil');
              ?>
              <?= $form->field($model, 'contacto')->textInput() ?>
              <?= $form->field($model, 'tipo')->dropDownList(
                  [
                    'Agricultor' => 'Agricultor',
                    'Pastor' => 'Pastor',
                    'Agricultor-Pastor' => 'Agricultor-Pastor'
                  ],
                  ['prompt'=>'Selecionar Tipo Fornecedor']
                ); ?>
              <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                <?php echo Select2::widget([
                    'model' => $profile,
                    'attribute' => 'id_regiao',
                    'data' => ArrayHelper::map(Regiao::find()->all(),'id','descricao'),
                    'options' => ['placeholder' => 'Select Product', 'id' => 'catid'],

                  ]);
                ?>
          </div>

          <div class="col-md-6">

              <?= $form->field($model, 'sexo')->widget(Select2::className(), [
                  'data' => [
                    'Masculino' => 'Masculino',
                    'Feminino' => 'Feminino'
                  ],
                  'options' => ['placeholder' => 'Escolha o sexo...', 'multiple' => false],
                  ])->label('Sexo Fornecedor');
              ?>

              <?= $form->field($model, 'endereco')->textInput(['maxlength' => true]) ?>
              <?= $form->field($model, 'data_nascimento')->widget(DatePicker::classname(), [
                  'options' => ['placeholder' => 'Enter birth date ...'],
                  'pluginOptions' => [
                      'autoclose'=>true,
                      'format' => 'yyyy-m-d'
                  ]
              ]);?>
              <?= $form->field($model, 'BI')->textInput() ?>
              <?= $form->field($model, 'NIF')->textInput() ?>

              <?= $form->field($model, 'numero_agregado')->textInput() ?>
              <?= $form->field($model, 'grau_parentesco')->textInput(['maxlength' => true]) ?>
          </div>

        </div>

        <div class="form-group">
            <?= Html::submitButton('<i class="glyphicon glyphicon-refresh"></i> Atualizar Dados',['class' => 'btn btn-lg btn-primary']) ?>
        </div>

      <?php ActiveForm::end(); ?>
  </div>
</div>
