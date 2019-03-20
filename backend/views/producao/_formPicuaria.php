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
    <div class="form-group col-sm-2   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
    </div>
    <div class="form-group col-sm-2   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
    </div>
    <div class="form-group col-sm-2   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
    </div>
    <div class="form-group col-sm-2   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
    </div>
    <div class="form-group col-sm-2   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
    </div>
    <div class="form-group col-sm-2   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
      <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
      </div>
    </div>

    <div class="well" style="overflow: auto">
      <div class="x_title">
        <h2 style="text-align: center;font-size: 15px;">Informacoes Gado</h2>
        <div class="clearfix"></div>
      </div>

      <div class="form-group col-sm-12   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= $form->field($model, 'id_gado')->widget(Select2::className(), [
          'data' => ArrayHelper::map(Gado::find()->all(),'id','nome'),
          'options' => ['placeholder' => 'Escolha um Gado', 'id' => 'catidd'],
        ]);?>
      </div>
    </div>

      <div class="well" style="overflow: auto">
        <div class="x_title">
          <h2 style="text-align: center;font-size: 15px;">Informacoes Producao</h2>
          <div class="clearfix"></div>
        </div>

        <div class="form-group col-sm-12  gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
          <?= $form->field($model, 'codigo_producao_id')->widget(Select2::className(), [
            'data' => ArrayHelper::map(CodigoProducao::find()->all(),'id','codigo'),
            'options' => ['placeholder' => 'Escolha um Codigo', 'id' => 'catidss'],
          ]);?>
        </div>

        <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
          <?= $form->field($model, 'quantidade_producao')->textInput() ?>
        </div>

        <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
          <?= $form->field($model, 'quantidade_perda')->textInput() ?>
        </div>

        <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
          <?= $form->field($model, 'data_colheita')->widget(DatePicker::classname(), [
              'options' => ['placeholder' => 'Enter birth date ...'],
              'pluginOptions' => [
                  'autoclose'=>true
              ]
          ]);?>
        </div>

        <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
          <?= $form->field($model, 'preco_kilo')->textInput() ?>
        </div>
      </div>

    <?php ActiveForm::end(); ?>

</div>
