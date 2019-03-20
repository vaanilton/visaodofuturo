<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use backend\models\Produto;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\models\Stock */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stock-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_produto')->label(false)->widget(Select2::className(), [
      'data' => ArrayHelper::map(Produto::find()->all(),'id','nome'),
      'options' => ['placeholder' => 'Escolha um Produto', 'id' => 'catid'],
    ]);?>

    <?= $form->field($model, 'quantidade')->textInput() ?>

    <?= $form->field($model, 'data_registo')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter birth date ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-m-d'
        ]
    ]);?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
