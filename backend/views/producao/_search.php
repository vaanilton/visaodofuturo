<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProducaoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producao-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_cultivo') ?>

    <?= $form->field($model, 'id_gado') ?>

    <?= $form->field($model, 'tipo') ?>

    <?= $form->field($model, 'descricao') ?>

    <?php // echo $form->field($model, 'quantidade_producao') ?>

    <?php // echo $form->field($model, 'quantidade_perda') ?>

    <?php // echo $form->field($model, 'data_colheita') ?>

    <?php // echo $form->field($model, 'preco_kilo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
