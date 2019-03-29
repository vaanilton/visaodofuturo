<?php

  use yii\helpers\Html;
  use yii\widgets\DetailView;
  use backend\models\Fornecedor;
  use backend\models\Regiao;
  use backend\models\Producao;
  use yii\helpers\Url;
  use yii\widgets\LinkPager;
  use yii\grid\GridView;
  use yii\helpers\ArrayHelper;
  use backend\models\Cultivo;
  use kartik\date\DatePicker;
  use backend\models\ProducaoSearch;
  /* @var $this yii\web\View */
  /* @var $model backend\models\Fornecedor */

  $this->title = 'View';
  $this->params['breadcrumbs'][] = ['label' => 'Fornecedors', 'url' => ['index']];
  $this->params['breadcrumbs'][] = $this->title;
  ?>

  <div class="fornecedor-view">
    <div class="form-group col-sm-7   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
    </div>

    <div class="x_panel">
      <br>
      <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <img src="<?php echo Yii::getAlias('@web').'/'.$model['photo'] ?>" class=""  alt="" width="440" height='475'>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">

        <?php if($profile=$model){ ?>

          <h4 style="background-color: #E9EBEE;padding: 18px;font-size: 16px;
                      font-family: Open Sans; letter-spacing:2px;
                      vertical-align: baseline; line-height: 32px;
                      font-style: negrito ;text-align: justify;">

              Nome - <?= $profile->nome.' '.$profile->sobrenome; ?>
          </h4>

          <h4 style="background-color: #E9EBEE;padding: 18px;font-size: 16px;
                      font-family: Open Sans; letter-spacing:2px;
                      vertical-align: baseline; line-height: 32px;
                      font-style: negrito ;text-align: justify;">
              Data Nascimento - <?= $profile->data_nascimento; ?><br>
              Genero - <?= $profile->sexo; ?><br>
              Endereço - <?= $profile->endereco; ?><br><br>
              Numero BI - <?= $profile->BI; ?><br>
              Numero NIF - <?= $profile->NIF; ?><br>
              Estado Civil - <?= $profile->estado_civil; ?><br>
              Grau de Parentesco - <?= $profile->grau_parentesco; ?><br>
              Numero Agregado - <?= $profile->numero_agregado; ?><br>
              Tipo Colaborador - <?= $profile->tipo; ?><br>

              <?php $regiao = Regiao::find()->where(['id'=>$profile->id_regiao])->one();
              if($regiao){?>
                  Regiao - <?= $regiao->localidade; ?>
              <?php }?>

          </h4>
          <div class="col-sm-6">

          </div>
          <div class="col-sm-8">

            <?php if($profile->status == 0){?>
              <?= Html::a('<i class="fa fa-edit"></i> Ativar',['ativar', 'id' => $model->id],['class' => 'btn btn-success']) ?>
            <?php } ?>

            <?= Html::a('<i class="fa fa-edit"></i> Update',['update', 'id' => $model->id],['class' => 'btn btn-primary']) ?>
            <?= Html::a('<i class="fa fa-trash-o"></i> Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
          </div>
        <?php } ?>
      </div>
    </div>
    <br><br>

    <div class="col-md-12">

				<div class="tabs">
					<ul class="nav nav-tabs" style="background-color: #D0DCE0;padding: 5px;font-size: 16px;
                      font-family: Open Sans; letter-spacing:2px;
                      vertical-align: baseline; line-height: 32px;
                      font-style: negrito ;text-align: justify;">
						<li class="active" role="presentation">
							<a href="#modelCultivo" aria-controls="user" role="tab" data-toggle="tab" aria-expanded="true">Cultivos</a>
						</li>
						<li class="" role="presentation">
							<a href="#modelGado" aria-controls="user" role="tab" data-toggle="tab" aria-expanded="false">Gados</a>
						</li>
            <li class="" role="presentation">
							<a href="#modelProducao" aria-controls="user" role="tab" data-toggle="tab" aria-expanded="false">Produção</a>
						</li>
            <li class="" role="presentation">
							<a href="#modelEmprestimo" aria-controls="user" role="tab" data-toggle="tab" aria-expanded="false">Emprestimos</a>
						</li>
            <li class="" role="presentation">
							<a href="#modelDebitocredito" aria-controls="user" role="tab" data-toggle="tab" aria-expanded="false">Debito Credito</a>
						</li>
					</ul>
					<div class="tab-content">

						<div class="tab-pane fade active in" id="modelCultivo">
							<?= $this->render('viewCultivo', [
                'dataProvider' => $dataProviderCultivo,
                'searchModel' => $searchModelCultivo,
                'modelsCultivo' => $modelsCultivo,
							]) ?>
						</div>

						<div class="tab-pane fade active" id="modelGado">
							<?= $this->render('viewGado', [
                'dataProvider' => $dataProviderGado,
                'searchModel' => $searchModelGado,
                'modelsGado' => $modelsGado,
							]) ?>
						</div>

            <div class="tab-pane fade" id="modelProducao">
							<?= $this->render('viewProducao', [
                'dataProvider' => $dataProviderProducao,
							]) ?>
						</div>

            <div class="tab-pane fade" id="modelEmprestimo">
							<?= $this->render('viewEmprestimo', [
                'dataProvider' => $dataProviderEmprestimo,
                'searchModel' => $searchModelEmprestimo,
							]) ?>
						</div>

            <div class="tab-pane fade" id="modelDebitocredito">
							<?= $this->render('viewDebitoCredito', [
                'modelCredito' => $modelCredito,
                'modelsemprestimo' => $modelsemprestimo,
							]) ?>
						</div>

					</div>
				</div>
			</div>

  </div>
