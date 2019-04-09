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
    <h5 style="background-color: #D0DCE0;padding: 8px;font-size: 14px;
                font-family: Open Sans; letter-spacing:2px;
                vertical-align: baseline; line-height: 32px;
                font-style: negrito ;text-align: justify;"><?=Html::encode($this->title).' - '.$model->nome.' '.$model->sobrenome ?>

      <div class="pull-right">
        <p>
          <?= Html::a('<i class="glyphicon glyphicon-refresh"></i> Atualizar Dados', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
          <?= Html::a('<i class="glyphicon glyphicon-trash"></i> Remover', ['delete', 'id' => $model->id], [
              'class' => 'btn btn-danger',
              'data' => [
                  'confirm' => 'Are you sure you want to delete this item?',
                  'method' => 'post',
              ],
          ]) ?>
        </p>
      </div>
    </h5>

    <div class="col-md-12 panel">
      <br>
      <div class="col-md-6">
        <img height="445px" width="450px" src="<?php echo Yii::getAlias('@web').'/'.$model->photo ?>" alt="<?= $model->nome; ?>"/>
      </div>

      <div class="col-md-6" style="background-color: #E9EBEE;padding: 18px;font-size: 16px;
                  font-family: Open Sans; letter-spacing:2px;
                  vertical-align: baseline; line-height: 32px;
                  font-style: negrito ;text-align: justify;">
        <?php if($profile=$model){ ?>

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
        <?php } ?>
      </div>
    </div>

    <div class="col-md-12 panel">
      <br>

				<div class="tabs">
					<ul class="nav nav-tabs" style="background-color: #D0DCE0;padding: 1px;font-size: 12px;
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
