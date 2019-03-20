<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\Regiao;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="container-fluid">
<div class="row">
<div class="contentbox">
<div id="modal-user" class="modal fade create-user" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New User</h4>
            </div>
            <?php $form = ActiveForm::begin([
                'id' => 'form-signup',
                'options' => ['enctype' => 'multipart/form-data'],
                'enableAjaxValidation' => true,
                // 'enableClientValidation' => true,
                ]); ?>
                <div class="modal-body">
                    <div class="form-group">
                            <label class="control-label"></label>
                            <?= $form->field($model, 'photo')->fileInput(['onchange'=>'readURLs(this)','id'=>"photo",'accept' => 'image/*'])->label(false) ?>
                            <div class="upload_img text-center">
                                <img class="img-responsive" id="blahs" src="#" alt="" />
                                <div id="papelFundos">
                                <i class="glyphicon glyphicon-camera" id='uploads'></i>
                                </div>
                                <i class="glyphicon glyphicon-trash" id="trashds"></i><!-- style="background: #fff; border-radius: 4px;" -->
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">

                          <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>
                          <?= $form->field($model, 'sobrenome')->textInput(['maxlength' => true]) ?>
                          <?= $form->field($model, 'estado_civil')->dropDownList(
                              ['Solteiro' => 'Solteiro', 'Casado' => 'Casado', 'Divorciado' => 'Divorciado'],
                              ['prompt'=>'Select Estado Civil']
                            ); ?>

                            <?= $form->field($model, 'sexo')->dropDownList(
                                ['Masculino' => 'Masculino', 'Feminino' => 'Feminino'],
                                ['prompt'=>'Selecionar Sexo']
                              ); ?>

                        </div>
                        <div class="col-md-4">
                          <?= $form->field($model, 'data_nascimento')->textInput() ?>
                          <?= $form->field($model, 'NIF')->textInput() ?>
                          <?= $form->field($model, 'contacto')->textInput() ?>

                        </div>
                        <div class="col-md-4">
                          <?= $form->field($model, 'endereco')->textInput(['maxlength' => true]) ?>
                          <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                          <?= $form->field($model, 'numero_agregado')->textInput() ?>

                        </div>
                    </div>

                    <?= $form->field($model, 'grau_parentesco')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'id_regiao')->dropDownList(
                      ArrayHelper::map(
                        Regiao::find()->all(),'id','descricao'
                      ),['prompt'=>'Select Regiao']
                      ) ?>
                      <?= $form->field($model, 'BI')->textInput() ?>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <?php  echo Html::submitButton('Create User', ['class' => 'btn btn-primary']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<?php
$script=<<<JS

    $('#trashds').hide();
    $('#papelFundos').hover($('#papelFundos').css('cursor','pointer'));
    $('#files').hide();
    $('#blahs').hide();
    $('#papelFundos').css('opacity',1);
    $('#papelFundos').css('background','#f4f7fa');

    $('#papelFundos').click(function() {
        if( $('#blahs').attr('src')=='#'){
            $('#files').click();
        }
    });

     $('#trashds').click(function() {
         $('#files').val('');
         $('#uploads').show();
         $('#blahs').attr('src','#');
         $('#blahs').hide();
         $('#files').val('');
         $('#trashds').hide();
         $('#papelFundos').css('opacity',1)

     })


JS;
$this->registerJS($script);

?>

<script type="text/javascript">

function readURLs(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blahs').attr('src', e.target.result);
            $('#uploads').hide();
            $('#blahs').show();
            $('#papelFundos').show();
            $('#trashds').show();
            $('#trashds').hover($('#trashds').css('cursor','pointer'));
            $('#papelFundos').css('opacity',0.5);
        }

        reader.readAsDataURL(input.files[0]);
    }

}
</script>
