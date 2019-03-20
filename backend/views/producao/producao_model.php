<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Producao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'id_cultivo')->textInput() ?>

    <?= $form->field($model, 'id_gado')->textInput() ?>

    <?= $form->field($model, 'tipo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantidade_producao')->textInput() ?>

    <?= $form->field($model, 'quantidade_perda')->textInput() ?>

    <?= $form->field($model, 'data_colheita')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'preco_kilo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
