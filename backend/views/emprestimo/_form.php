<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\Fornecedor;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\Emprestimo */
/* @var $form yii\widgets\ActiveForm */
$arrayFornecedor = array();
$fornecedor = Fornecedor::find()->where(['status'=>10])->all();
if($fornecedor){
  foreach ($fornecedor as $key => $value) {
      $arrayFornecedor [$key] =[
        (int)$value['id'],
        $value['nome'].' '.$value['sobrenome']
      ];
  }
}

?>

<div class="emprestimo-form" style="background-color: #D0DCE0;padding: 8px;font-size: 14px;
            font-family: Open Sans; letter-spacing:2px;
            vertical-align: baseline; line-height: 32px;
            font-style: negrito ;text-align: justify;">

    <?php $form = ActiveForm::begin(); ?>

    <div class="well" style="overflow: auto">
      <div class="x_title">
        <h2 style="text-align: center;font-size: 15px;">Informacoes Fornecedor</h2>
        <div class="clearfix"></div>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($model, 'id_fornecedor')->widget(Select2::className(), [
          'data' => ArrayHelper::map(Fornecedor::find()->where(['status'=>10])->all(),'id',"nome"),
          'options' => ['placeholder' => 'Escolha um Agricultor', 'id' => 'catid'],
        ]);?>
      </div>
    </div>

    <div class="well" style="overflow: auto">
      <div class="x_title">
        <h2 style="text-align: center;font-size: 15px;">Informacoes Emprestimo</h2>
        <div class="clearfix"></div>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($model, 'tipo')->widget(Select2::className(), [
          'data' => [
            'Medicamentos' => 'Medicamento',
            'Equipamentos' => 'Equipamento',
          ],
          'options' => ['placeholder' => 'Escolha o Tipo de Emprestimo...', 'multiple' => false],
          ]);
        ?>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>
      </div>

      <div class="form-group col-sm-4   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($model, 'quantidade')->textInput() ?>
      </div>

      <div class="form-group col-sm-4   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($model, 'quantidade_monetario')->textInput() ?>
      </div>

      <div class="form-group col-sm-4   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($model, 'data_devolucao')->widget(DatePicker::classname(), [
          'options' => ['placeholder' => 'Enter birth date ...'],
          'pluginOptions' => [
              'autoclose'=>true,
              'format' => 'yyyy-m-d'
          ]]);
        ?>
      </div>

    </div>
    <div class="form-group">
        <?= Html::submitButton('<i class="glyphicon glyphicon-floppy-disk"></i> Salvar',['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
