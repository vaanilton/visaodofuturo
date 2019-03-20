<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Cultivo;
use backend\models\Gado;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use backend\models\Fornecedor;
use backend\models\Regiao;
use yii\helpers\Url;
use kartik\file\FileInput;
use backend\models\CodigoProducao;

$this->title = 'Create Producao';
$this->params['breadcrumbs'][] = ['label' => 'Producaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="producao-form">
  <div class="x_panel">
  <table class="table table-striped table-hover" >
    <thead>
      <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">Foto</th>
      <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">Nome</th>
      <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">Nome do Gado</th>
      <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">Regiao</th>
      <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">Quantidade</th>
      <th style="background-color: #E9EBEE;padding: 10px;text-align: center;font-size: 12px;">Data Resgistrado</th>
    </thead>

      <?php
        $gado1 = Gado::find()->where(['id' => $gado, 'status'=> 10])->One();
        if ($gado1) {
      ?>
              <div class="col-md-4">
                <tbody>
                  <?php
                    $modelsFornecedor = Fornecedor::find()->where(['id'=>$gado1['id_fornecedor'], 'status'=>10])->all();
                    if ($modelsFornecedor) {
                      foreach ($modelsFornecedor as $key => $fornecedor) {
                  ?>
                    <tr class='clickable-row' data-href='<?= Url::to(['gado/view','id'=>$gado1['id']]); ?>'>

                      <td style="text-align: center;">
                        <a>
                            <img height="60px" width="60px" src="<?php echo Yii::getAlias('@web').'/'.$gado1['photo'] ?>" class="thumb-img" title="<?= $gado1['nome']; ?>" alt="<?= $gado1['nome']; ?>" width="230" height='230'>
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

                      <td style="text-align: center;">
                        <br>
                        <?= $gado1['nome']; ?>
                      </td>

                      <?php
                        $modelsRegiao = Regiao::find()->where(['id'=>$gado1['id_regiao']])->all();
                        if ($modelsRegiao) {
                          foreach ($modelsRegiao as $key => $regiao) {
                      ?>

                      <td style="text-align: center;">
                        <br>
                        <?= $regiao['localidade']; ?>
                      </td>

                      <?php
                        }}
                      ?>

                      <td style="text-align: center;">
                        <br>
                        <?= $gado1['quantidade']; ?>
                      </td>

                      <td style="text-align: center;">
                        <br>
                        <?= $gado1['data_registo']; ?>
                      </td>

                    </tr>
                  </tbody>
                </div>

            </table>
          <?php
          }
          ?>
        </div>
      </div>

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'designacao')->textInput() ?>
    <?= $form->field($model, 'quantidade_producao')->textInput() ?>

    <?= $form->field($model, 'quantidade_perda')->textInput() ?>

    <?= $form->field($model, 'data_colheita')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter birth date ...'],
        'pluginOptions' => [
            'autoclose'=>true
        ]
    ]);?>

    <?= $form->field($model, 'preco_kilo')->textInput() ?>

    <?= $form->field($model, 'codigo_producao_id')->dropDownList(
      ArrayHelper::map(
        CodigoProducao::find()->all(),'id','codigo'
      ),['prompt'=>'Select Codigo'])
    ?>

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
