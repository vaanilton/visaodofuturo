<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Fornecedor;
use backend\models\Regiao;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\models\Cultivo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cultivo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_fornecedor')->dropDownList(
      ArrayHelper::map(
        Fornecedor::find()->where(['tipo'=>'Agricultor'])->all(),'id','nome'
      ),['prompt'=>'Select Agricultor']
      ) ?>

    <?= $form->field($model, 'id_regiao')->dropDownList(
      ArrayHelper::map(
        Regiao::find()->all(),'id','descricao'
      ),['prompt'=>'Select Regiao']
      ) ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tamanho_do_solu')->textInput() ?>

    <?= $form->field($model, 'nome_do_planteio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_do_planteio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempo_do_cultivo')->dropDownList(
        [
          'Inverno' => 'Inverno',
          'Primavera' => 'Primavera',
          'Verao' => 'Verao',
          'Outono' => 'Outono',
        ],
        ['prompt'=>'Selecionar Tempo']
      ); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
