<?php
use yii\helpers\Url;
?>

<div class="fornecedor-index">

  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-body tabs">
        <ul class="nav nav-tabs">
          <li class="active" role="presentation">
            <a href="#Cultivos" aria-controls="user" role="tab" data-toggle="tab" aria-expanded="true">Cultivos</a>
          </li>

          <li class="" role="presentation">
            <a href="#Gados" aria-controls="user" role="tab" data-toggle="tab" aria-expanded="false">Gados</a>
          </li>

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
              'profile' => $modelsGado,
            ]) ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
