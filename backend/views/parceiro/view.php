<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Profile;
use backend\models\ItemSearch;
/* @var $this yii\web\View */
/* @var $model backend\models\Parceiro */

$this->title = 'View';
$this->params['breadcrumbs'][] = ['label' => 'Parceiros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parceiro-view">

  <h5 style="background-color: #D0DCE0;padding: 8px;font-size: 14px;
              font-family: Open Sans; letter-spacing:2px;
              vertical-align: baseline; line-height: 32px;
              font-style: negrito ;text-align: justify;"><?= Html::encode($this->title) ?>

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
    <h4 style="background-color: #D0DCE0;padding: 18px;font-size: 16px;
                font-family: Open Sans; letter-spacing:2px;
                vertical-align: baseline; line-height: 32px;
                font-style: negrito ;text-align: justify;">

        Nome do Parceiro - <?= $model->nome ?>
    </h4>
    <div class="col-md-6">
      <img height="200px" width="450px" src="<?php echo Yii::getAlias('@web').'/'.$model->photo ?>" alt="<?= $model->nome; ?>"/>
    </div>

    <div class="col-md-6" style="background-color: #E9EBEE;padding: 18px;font-size: 16px;
                font-family: Open Sans; letter-spacing:2px;
                vertical-align: baseline; line-height: 32px;
                font-style: negrito ;text-align: justify;">
      <?php if($model){ ?>

        <h4 style="background-color: #E9EBEE;">
            Numero NIF - <?= $model->nif; ?><br>
            Endereço - <?= $model->endereco; ?><br><br>
            Telefone - <?= $model->contacto; ?><br>
            Email - <?= $model->email; ?><br><br><br>
            Data Cadastrado - <?= $model->data_registro; ?>
        </h4>
      <?php } ?>
    </div>
  </div>

    <?php /* DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'id_utilizador',
            [
                'label'=>'Logotipo Parceiro',
                'format'=>'html',
                'value'=>function($data){
                  return Html::img(Yii::getAlias('@web').'/'.$data->photo,[
                    'width'=>'480px'
                  ]);
                }
            ],
            [
                  'attribute'=>'Nome Utilizador',
                  'value'=>function($data){
                      $fr = Profile::find()->where(['user_iduser'=>$data->id_utilizador])->one();
                      return $fr['nome'].' '.$fr['sobrenome'];
                   }
            ],
            'nome',
            'endereco',
            'nif',
            'data_registro',
            //'photo',
            //'status',
        ],
    ]) */ ?>

    <div class="col-md-12">
      <br>
      <div class="">
        <div class=" tabs">
          <ul class="nav nav-tabs" style="background-color: #D0DCE0;padding: 8px;font-size: 12px;
                      font-family: Open Sans; letter-spacing:2px;
                      vertical-align: baseline; line-height: 32px;
                      font-style: negrito ;text-align: justify;">
            <li class="active" role="presentation">
              <a href="#infoProduto" aria-controls="user" role="tab" data-toggle="tab" aria-expanded="true">Informações do Produto</a>
            </li>

            <li class="" role="presentation">
              <a href="#details-fatura" aria-controls="user" role="tab" data-toggle="tab" aria-expanded="true">Dados da Faturas (Solicitações)</a>
            </li>

            <li class="" role="presentation">
              <a href="#details-venda" aria-controls="user" role="tab" data-toggle="tab" aria-expanded="true">Dados das Vendas</a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane fade active in" id="infoProduto">
              <?php
                $searchModel = new ItemSearch();
                $searchModel->id_parceiro = $model->id;
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
              ?>
              <?= $this->render('indexItem', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
              ]) ?>
            </div>

            <div class="tab-pane fade" id="details-fatura">

            </div>

            <div class="tab-pane fade" id="details-venda">

            </div>

          </div>
        </div>
      </div>
    </div>
</div>
