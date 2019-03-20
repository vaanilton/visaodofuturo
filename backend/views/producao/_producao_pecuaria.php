<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Fornecedor;
use backend\models\Regiao;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\bootstrap\Modal;

$this->title = 'Registrar Producao Pecuaria';
$this->params['breadcrumbs'][] = ['label' => 'Producaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producao-form">


  <div class="col-md-6">
    <p>
      <h1>Lista de todos os Gados</h1>
    </p>
  </div>

  <div class="col-md-6">
    <div class="title_right">
      <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Pesquisar Fornecedor...">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">Pesquisar</button>
          </span>
        </div>
      </div>
    </div>
  </div>

  <div class="x_panel">

    <table class="table table-striped table-hover" >
      <thead>
        <th>Foto</th>
        <th>Nome</th>
        <th>Nome do Gado</th>
        <th>Regiao</th>
        <th>Quantidade</th>
        <th>Data Resgistrado</th>
        <th>Producao</th>
        <th>Editar</th>
        <th>Apagar</th>
      </thead>

        <?php
          if ($modelsgado) {
              foreach ($modelsgado as $key => $gado) {
        ?>
                <div class="col-md-4">
                  <tbody>
                    <?php
                      $modelsFornecedor = Fornecedor::find()->where(['id'=>$gado['id_fornecedor'], 'status'=>10])->all();
                      if ($modelsFornecedor) {
                        foreach ($modelsFornecedor as $key => $fornecedor) {
                    ?>
                      <tr class='clickable-row' data-href='<?= Url::to(['cultivo/view','id'=>$gado['id']]); ?>'>

                        <td>
                          <a href="<?= Url::to(['cultivo/view','id'=>$gado['id']]); ?>" class="image-popup" title="">
                              <img height="60px" width="60px" src="<?php echo Yii::getAlias('@web').'/'.$gado['photo'] ?>" class="thumb-img" title="<?= $gado['nome']; ?>" alt="<?= $gado['nome']; ?>" width="230" height='230'>
                          </a>
                        </td>

                        <td>
                          <?= $fornecedor['nome']; ?> <br>
                          <?= $fornecedor['sobrenome']; ?>
                        </td>

                        <?php
                          }}
                        ?>

                        <td><?= $gado['nome']; ?> <br>
                          <?= $gado['descricao']; ?>
                        </td>

                        <?php
                          $modelsRegiao = Regiao::find()->where(['id'=>$gado['id_regiao']])->all();
                          if ($modelsRegiao) {
                            foreach ($modelsRegiao as $key => $regiao) {
                        ?>

                        <td>
                          <?= $regiao['localidade']; ?>
                        </td>

                        <?php
                          }}
                        ?>

                        <td><?= $gado['quantidade']; ?></td>

                        <td><?= $gado['data_registo']; ?></td>

                        <td>
                          <?= Html::a('', ['producao/pecuaria' , 'id' => $gado['id']], [
                              'class' => 'btn btn-success fa fa-check-square-o',

                          ]) ?>
                        </td>

                        <td>
                          <?= Html::a('', ['update', 'id' => $gado['id']], [
                          'class' => 'btn btn-primary fa fa-edit'
                          ]) ?>
                        </td>

                        <td>
                          <?= Html::a('', ['apagar', 'id' => $gado['id']], [
                              'class' => 'btn btn-danger fa fa-trash-o',
                              'data' => [
                                  'confirm' => 'Are you sure you want to delete this item?',
                                  'method' => 'post',
                              ],
                          ]) ?>
                        </td>

                      </tr>
                      <?php
                          }
                      ?>
                    </tbody>
                  </div>

                  <th>Foto</th>
                  <th>Nome</th>
                  <th>Nome do Gado</th>
                  <th>Regiao</th>
                  <th>Quantidade</th>
                  <th>Data Resgistrado</th>
                  <th>Producao</th>
                  <th>Editar</th>
                  <th>Apagar</th>
              </table>
            <?php
            }
            ?>

    </div>
</div>

  <?php

      Modal::begin([
        'header'=>'<h4>Aluno</h4>',
        'id'=>'modal1',
        'size'=>'modal-lg',
      ]);
      echo "<div id='modalContent1'> </div>";
      Modal::end();

  ?>
