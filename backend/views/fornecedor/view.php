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

    <div class="form-group col-sm-5   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
      <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary fa fa-edit']) ?>
      <?= Html::a('Delete', ['delete', 'id' => $model->id], [
          'class' => 'btn btn-danger fa fa-trash-o',
          'data' => [
              'confirm' => 'Are you sure you want to delete this item?',
              'method' => 'post',
          ],
      ]) ?>
    </div>

    <br><br><br>

    <div class="x_panel">
      <br>
      <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <img src="<?php echo Yii::getAlias('@web').'/'.$model['photo'] ?>" class=""  alt="" width="440" height='490'>
      </div>

      <div class="form-group col-sm-6   gen-fields-holder" item-name="numero_documento" item-type="text" required="required">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'nome',
                'sobrenome',
                'sexo',
                'BI',
                'NIF',
                'data_nascimento',
                'endereco',
                'contacto',
                'estado_civil',
                'numero_agregado',
                'grau_parentesco',
                'tipo',
                'status',
                [
                    'attribute'=>'Regiao',
                    'value'=>function($data){
                        $fr = Regiao::find()->where(['id'=>$data->id_regiao])->one();
                        return $fr->localidade;
                    }

                ],
            ],
         ])
        ?>
      </div>
    </div>
    <br><br>

    <div class="col-md-12">

				<div class="tabs">
					<ul class="nav nav-tabs">
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
