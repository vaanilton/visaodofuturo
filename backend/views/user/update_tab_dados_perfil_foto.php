<?php
use yii\bootstrap\Nav;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use kartik\file\FileInput;
use kartik\select2\Select2;
use backend\models\Regiao;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
?>
    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <div class="form-group" style="background-color: #E9EBEE;padding: 18px;font-size: 16px;
                font-family: Open Sans; letter-spacing:2px;
                vertical-align: baseline;
                font-style: negrito ;text-align: justify;">

      <?= $form->field($profile, 'photo')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'showUpload' => true,
            'allowedFileExtensions' => ['jpg','png','jpeg'],
            'initialPreview'=>[
                "$profile->photo"
            ],
            'initialPreviewAsData'=>true,
            'initialCaption'=>"$profile->photo",
            'initialPreviewConfig' => [
                ['caption' => "$profile->photo", 'size' => '873727'],
            ],
            'overwriteInitial'=>true,
            'maxFileSize'=>2800
        ]
      ])?>

          <?= Html::submitButton('<i class="glyphicon glyphicon-refresh"></i> Atualizar Dados',['class' => 'btn btn-primary']) ?>

    </div>

  <?php ActiveForm::end(); ?>
