<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Cliente;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\models\Fatura */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fatura-form" style="background-color: #D0DCE0;padding: 8px;font-size: 14px;
            font-family: Open Sans; letter-spacing:2px;
            vertical-align: baseline; line-height: 32px;
            font-style: negrito ;text-align: justify;">

    <?php $form = ActiveForm::begin(); ?>

    <div class="well" style="overflow: auto">
      <label for="tel2" class="col-md-1 control-label">Data</label>
      <div class="form-group col-sm-4   gen-fields-holder">
					<?php echo date("d/m/Y");?>
			</div>

      <div class="form-group col-sm-6   gen-fields-holder">
        <?= $form->field($model, 'id_cliente')->widget(Select2::className(), [
          'data' => ArrayHelper::map(Cliente::find()->where(['status'=>10])->all(),'id',"nome"),
          'options' => ['placeholder' => 'Escolha um Cliente', 'id' => 'catid'],
        ]);?>
      </div>

      <div class="form-group col-sm-12   gen-fields-holder">
        <?= $form->field($model, 'total_venda')->textInput(['maxlength' => true]) ?>
      </div>
    </div>

    <div class="pull-right">
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> Novo Produto', ['item/create'], ['class' => 'btn btn-primary']) ?>

        <?= Html::a('<i class="glyphicon glyphicon-user"></i> Novo Cliente', ['cliente/create'], ['class' => 'btn btn-primary']) ?>

        <?= Html::a('<i class="glyphicon glyphicon-search"></i> Adicionar + Produtos', ['#'], ['class' => 'btn btn-primary', 'data-toggle' => 'modal', 'data-target' => '#modal-userr']) ?>

        <?= Html::submitButton('<i class="glyphicon glyphicon-print"></i> Salvar e Imprimir',['class' => 'btn btn-success']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php echo $this->render('modalAdicionarProdutoFatura',[
  'item' => $item,
  'pages' => $pages,
]);?>
