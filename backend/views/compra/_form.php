<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Producao;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\models\Compra */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="compra-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_producao')->label(false)->widget(Select2::className(), [
      'data' => ArrayHelper::map(Producao::find()->all(),'id','designacao'),
      'options' => ['placeholder' => 'Escolha um Produto', 'id' => 'catid'],
    ]);?>

    <?= $form->field($model, 'quantidade')->textInput() ?>

    <?= $form->field($model, 'preco_total')->textInput() ?>

    <?= $form->field($model, 'data')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
