<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EmprestimoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="emprestimo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
 
    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_fornecedor') ?>

    <?= $form->field($model, 'id_utilizador') ?>

    <?= $form->field($model, 'tipo') ?>

    <?= $form->field($model, 'nome') ?>

    <?php // echo $form->field($model, 'quantidade') ?>

    <?php // echo $form->field($model, 'data') ?>

    <?php // echo $form->field($model, 'data_devolucao') ?>

    <?php // echo $form->field($model, 'quantidade_monetario') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
