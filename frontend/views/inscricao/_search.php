<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\InscricaoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inscricao-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'morada') ?>

    <?= $form->field($model, 'sexo') ?>

    <?= $form->field($model, 'data_nascimento') ?>

    <?php // echo $form->field($model, 'escolaridade') ?>

    <?php // echo $form->field($model, 'BI') ?>

    <?php // echo $form->field($model, 'NIF') ?>

    <?php // echo $form->field($model, 'telefone') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'id_anuncio') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
