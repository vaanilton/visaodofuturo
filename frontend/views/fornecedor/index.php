<?php
use yii\helpers\Url;
use frontend\models\Fornecedor;

$id = Yii::$app->user->identity['id'];
$fornecedor = Fornecedor::find()->where(['user_iduser' => $id])->One();

?>

  <div class="fornecedor-index">
    <div class="panel panel-default">
        <ul class="nav nav-tabs" style="background-color: #D0DCE0;padding: 5px;font-size: 14px;
                    font-family: Open Sans; letter-spacing:2px;
                    vertical-align: baseline; line-height: 32px;
                    font-style: negrito ;text-align: justify;">

          <?php if($fornecedor->tipo == 'Agricultor-Pastor' || $fornecedor->tipo == 'Agricultor'){ ?>

            <li class="active" role="presentation">
              <a href="#Cultivos" aria-controls="user" role="tab" data-toggle="tab" aria-expanded="true">Cultivos</a>
            </li>

          <?php } ?>

          <?php if($fornecedor->tipo == 'Agricultor-Pastor' || $fornecedor->tipo == 'Pastor'){ ?>

            <li class="" role="presentation">
              <a href="#Gados" aria-controls="user" role="tab" data-toggle="tab" aria-expanded="false">Gados</a>
            </li>

          <?php } ?>

          <li class="" role="presentation">
            <a href="#Produções" aria-controls="user" role="tab" data-toggle="tab" aria-expanded="true">Produções</a>
          </li>

          <li class="" role="presentation">
            <a href="#Imprestimos" aria-controls="user" role="tab" data-toggle="tab" aria-expanded="false">Imprestimos</a>
          </li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane fade active in" id="Cultivos">
            <?= $this->render('informacaoCultivo', [
              'modelsCultivo' => $modelsCultivo,
            ]) ?>
          </div>

          <div class="tab-pane fade" id="Gados">
            <?= $this->render('informacaoGado', [
              'modelsGado' => $modelsGado,
            ]) ?>
          </div>

          <div class="tab-pane fade" id="Produções">
            <?= $this->render('informacaoProducao', [
              'searchModel' => $searchModel,
              'dataProvider' => $dataProvider,
            ]) ?>
          </div>

          <div class="tab-pane fade" id="Imprestimos">
            <?= $this->render('informacaoImprestimo', [
              'searchModelEmprestimo' => $searchModelEmprestimo,
              'dataProviderEmprestimo' => $dataProviderEmprestimo,
            ]) ?>
          </div>
        </div>
    </div>
  </div>
