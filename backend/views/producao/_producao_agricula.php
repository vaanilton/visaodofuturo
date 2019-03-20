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

$this->title = 'Registrar Producao Agricula';
$this->params['breadcrumbs'][] = ['label' => 'Producaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producao-form">


  <div class="col-md-6">
    <p>
      <h1>Lista de todos os cultivos</h1>
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

  <table class="table table-striped table-hover">
      <thead>
          <th>Foto</th>
          <th>Agricultor</th>
          <th>Regiao</th>
          <th>Planteio</th>
          <th>Descricao</th>
          <th>Terreno</th>
          <th>Data Planteio</th>
          <th>Registado</th>
          <th>Producao</th>
          <th>Editar</th>
          <th>Apagar</th>
      </thead>
        <?php
          if ($modelsCultivo) {

                foreach ($modelsCultivo as $key => $cultivo) {
        ?>
                  <div class="col-md-4">
                    <tbody>

                        <tr>

                          <td>
                            <a href="<?= Url::to(['cultivo/view','id'=>$cultivo['id']]); ?>" class="image-popup" title="">
                                <img height="60px" width="60px" src="<?php echo Yii::getAlias('@web').'/'.$cultivo['photo'] ?>" class="thumb-img" title="<?= $cultivo['nome_do_planteio']; ?>" alt="<?= $cultivo['nome_do_planteio']; ?>" width="230" height='230'>
                            </a>
                          </td>

                          <?php

                            $modelfornecedor = Fornecedor::find()->where(['id'=>$cultivo['id_fornecedor'], 'status'=>10])->all();

                            if ($modelfornecedor) {
                              foreach ($modelfornecedor as $key => $fornecedor) {
                          ?>

                            <td>
                              <?= $fornecedor['nome']; ?>
                            </td>

                          <?php
                              }
                            }

                            $modelregiao = Regiao::find()->where(['id'=>$cultivo['id_regiao']])->all();

                            if ($modelregiao) {
                              foreach ($modelregiao as $key => $regiao) {
                          ?>

                              <td>
                                <?= $regiao['localidade']; ?>
                              </td>

                          <?php
                              }
                            }
                          ?>

                          <td>
                            <?= $cultivo['nome_do_planteio']; ?>
                          </td>

                          <td>
                            <?= $cultivo['descricao']; ?>
                          </td>

                          <td>
                            <?= $cultivo['tamanho_do_solu'].' (m²)'; ?>
                          </td>

                          <td>
                            <?= $cultivo['data_do_planteio']; ?>
                          </td>

                          <td>
                            <?= $cultivo['data_registro']; ?>
                          </td>

                          <td>
                            <?= Html::a('', ['producao/agricula' , 'id' => $cultivo['id']], [
                                'class' => 'btn btn-success fa fa-check-square-o',
                                'data' => [
                                    'confirm' => 'Tem Certeza que Pretendes realisar uma producao para este cultivo?',
                                    'method' => 'post',
                                ],

                            ]) ?>
                          </td>

                          <td>
                            <?= Html::a('', ['cultivo/update', 'id' => $cultivo['id']], [
                                'class' => 'btn btn-primary fa fa-edit'
                            ]) ?>
                          </td>

                          <td>
                            <?= Html::a('', ['cultivo/apagar', 'id' => $cultivo['id']], [
                                'class' => 'btn btn-danger fa fa-trash-o',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                          </td>
                        </tr>
                      </a>
                    </tbody>
                  </div>
              <?php
                }
              ?>
              <th>Foto</th>
              <th>Agricultor</th>
              <th>Regiao</th>
              <th>Planteio</th>
              <th>Descricao</th>
              <th>Terreno</th>
              <th>Data Planteio</th>
              <th>Registado</th>
              <th>Producao</th>
              <th>Editar</th>
              <th>Apagar</th>
              </table>
          <?php
          }
          ?>
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
