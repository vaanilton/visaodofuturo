<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Cultivo;
use backend\models\CodigoProducao;
use backend\models\Gado;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model backend\models\Producao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producao-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="well" style="overflow: auto">
      <div class="x_title">
        <h2 style="text-align: center;font-size: 15px;">Informacoes Fornecedor</h2>
        <div class="clearfix"></div>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($model, 'id_cultivo')->widget(Select2::className(), [
          'data' => ArrayHelper::map(Cultivo::find()->all(),'id','nome_do_planteio'),
          'options' => ['placeholder' => 'Escolha um Cultivo', 'id' => 'catid'],
        ]);?>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($model, 'id_gado')->widget(Select2::className(), [
          'data' => ArrayHelper::map(Gado::find()->all(),'id','descricao'),
          'options' => ['placeholder' => 'Escolha um Gado', 'id' => 'catidd'],
        ]);?>
      </div>


    <?= $form->field($model, 'tipo')->dropDownList(
        [
          'Agricula' => 'Agricula',
          'Pecuaria' => 'Pecuaria',
        ],
        ['prompt'=>'Selecionar Tipo Producao']
      ); ?>

    <?= $form->field($model, 'quantidade_producao')->textInput() ?>

    <?= $form->field($model, 'quantidade_perda')->textInput() ?>

    <?= $form->field($model, 'codigo_producao_id')->dropDownList(
      ArrayHelper::map(
        CodigoProducao::find()->all(),'id','codigo'
      ),['prompt'=>'Select Codigo'])
    ?>

    <?= $form->field($model, 'data_colheita')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter birth date ...'],
        'pluginOptions' => [
            'autoclose'=>true
        ]
    ]);?>

    <?= $form->field($model, 'preco_kilo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
