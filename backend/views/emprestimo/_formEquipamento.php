<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Fornecedor;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Emprestimo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
      <div class="col-md-12">
        <?= $form->field($modelEquipamento, 'nome')->textInput(['maxlength' => true]) ?>
        <?= $form->field($modelEquipamento, 'quantidade')->textInput() ?>
        <?= $form->field($modelEquipamento, 'quantidade_monetario')->textInput() ?>
        <?= $form->field($modelEquipamento, 'data_devolucao')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Data da Devolucao ...'],
            'pluginOptions' => [
                'autoclose'=>true
            ]
        ]);?>
      </div>

    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
