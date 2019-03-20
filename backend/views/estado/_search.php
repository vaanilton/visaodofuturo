<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EstadoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estado-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_iduser') ?>

    <?= $form->field($model, 'data_hr_inicio') ?>

    <?= $form->field($model, 'data_hr_fim') ?>

    <?= $form->field($model, 'data') ?>

    <?php // echo $form->field($model, 'despositivo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
