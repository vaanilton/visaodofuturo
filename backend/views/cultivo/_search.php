<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CultivoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cultivo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_fornecedor') ?>

    <?= $form->field($model, 'id_regiao') ?>

    <?= $form->field($model, 'descricao') ?>

    <?= $form->field($model, 'tamanho_do_solu') ?>

    <?php // echo $form->field($model, 'nome_do_planteio') ?>

    <?php // echo $form->field($model, 'data_do_planteio') ?>

    <?php // echo $form->field($model, 'tempo_do_cultivo') ?>

    <?php // echo $form->field($model, 'data_registo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
