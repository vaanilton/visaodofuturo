<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Cultivo;
use backend\models\Fornecedor;
use backend\models\CodigoProducao;
use backend\models\Regiao;
use backend\models\Gado;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use yii\helpers\Url;
use kartik\file\FileInput;
use kartik\select2\Select2;

$this->title = 'Create Producao';
$this->params['breadcrumbs'][] = ['label' => 'Producaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="producao-form">
  <div class="x_panel">
    <table class="table table-striped table-hover" >
      <thead>
        <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">Foto</th>
        <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">Agricultor</th>
        <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">Nome da Plantacao</th>
        <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">Descricao</th>
        <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">Regiao</th>
        <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">Data do Planteio</th>
        <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">Solo</th>
        <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">Cultivo</th>
        <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">Data Resgistrado</th>
      </thead>

      <?php
        $cultivo1 = Cultivo::find()->where(['id' => $cultivo, 'status'=> 10])->One();
        if($cultivo1){
      ?>
          <div class="col-md-4">
            <tbody>
              <?php

                $modelfornecedor = Fornecedor::find()->where(['id'=>$cultivo1['id_fornecedor'], 'status'=>10])->all();

                if ($modelfornecedor) {
                  foreach ($modelfornecedor as $key => $fornecedor) {
              ?>
                <tr>

                  <td style="text-align: center;">
                    <a>
                        <img height="60px" width="60px" src="<?php echo Yii::getAlias('@web').'/'.$cultivo1['photo'] ?>" class="thumb-img" title="<?= $cultivo1['nome_do_planteio']; ?>" alt="<?= $cultivo1['nome_do_planteio']; ?>" width="230" height='230'>
                    </a>
                  </td>

                  <td style="text-align: center;">
                    <img height="60px" width="60px" src="<?php echo Yii::getAlias('@web').'/'.$fornecedor['photo'] ?>" class="thumb-img" title="<?= $fornecedor['nome']; ?>" alt="<?= $fornecedor['nome']; ?>" width="230" height='230'>
                    <?= $fornecedor['nome']; ?>
                    <?= $fornecedor['sobrenome']; ?>
                  </td>

                  <?php
                    }}
                  ?>

                  <td style="text-align: center;"> <br> <?= $cultivo1['nome_do_planteio']; ?></td>
                  <td style="text-align: center;"> <br> <?= $cultivo1['descricao']; ?></td>

                  <?php

                    $modelregiao = Regiao::find()->where(['id'=>$cultivo1['id_regiao']])->One();

                    if ($modelregiao) {
                  ?>
                    <td style="text-align: center;">
                      <br>
                      <?= $modelregiao['localidade']; ?>
                    </td>
                    <?php
                      }
                    ?>

                  <td style="text-align: center;"> <br> <?= $cultivo1['data_do_planteio']; ?></td>
                  <td style="text-align: center;"> <br> <?= $cultivo1['tamanho_do_solu']; ?></td>

                  <td style="text-align: center;"> <br> <?= $cultivo1['tempo_do_cultivo']; ?></td>
                  <td style="text-align: center;"> <br> <?= $cultivo1['data_registro']; ?></td>

                </tr>
              </tbody>
            </div>
        <?php
        }
        ?>
      </table>
  </div>


  <div class="x_panel">
    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-6">
      <?= $form->field($model, 'designacao')->textInput() ?>
      <?= $form->field($model, 'quantidade_producao')->textInput() ?>

      <?= $form->field($model, 'quantidade_perda')->textInput() ?>
    </div>

    <div class="col-md-6">
      <?= $form->field($model, 'data_colheita')->widget(DatePicker::classname(), [
          'options' => ['placeholder' => 'Enter birth date ...'],
          'pluginOptions' => [
              'autoclose'=>true
          ]
      ]);?>
      <?= $form->field($model, 'preco_kilo')->textInput() ?>

      <?= $form->field($model, 'codigo_producao_id')->widget(Select2::className(), [
        'data' => ArrayHelper::map(CodigoProducao::find()->all(),'id','codigo'),
        'options' => ['placeholder' => 'Select Codigo', 'id' => 'catid'],
      ]);?>
    </div>

    <?= $form->field($model, 'photo')->widget(FileInput::classname(), [
      'options' => ['accept' => 'image/*'],
      'pluginOptions' => [
          'showUpload' => true,
          'allowedFileExtensions' => ['jpg','png','jpeg'],
          'initialPreview'=>[
              "$model->photo"
          ],
          'initialPreviewAsData'=>true,
          'initialCaption'=>"$model->photo",
          'initialPreviewConfig' => [
              ['caption' => "$model->photo", 'size' => '873727'],
          ],
          'overwriteInitial'=>true,
          'maxFileSize'=>2800
      ]
    ])?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
  </div>
</div>
