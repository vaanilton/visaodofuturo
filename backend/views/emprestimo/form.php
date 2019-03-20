<?php
  use yii\helpers\Url;
  use yii\helpers\Html;
  $this->title = 'Registrar Emprestimo';
  $this->params['breadcrumbs'][] = ['label' => 'Emprestimo', 'url' => ['index']];
  $this->params['breadcrumbs'][] = $this->title;
?>

<div class="emprestimo-create">
  <div class="col-md-12">
    <div class="title_right">
      <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Pesquisar Por BI...">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">Pesquisar</button>
          </span>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <table class="table table-striped table-hover">
      <thead>
        <th style="background-color: #E9EBEE;padding: 5px;text-align: center;font-size: 10px;">Foto</th>
        <th style="background-color: #E9EBEE;padding: 5px;text-align: center;font-size: 10px;">Nome</th>
        <th style="background-color: #E9EBEE;padding: 5px;text-align: center;font-size: 10px;">Sobrenome</th>
        <th style="background-color: #E9EBEE;padding: 5px;text-align: center;font-size: 10px;">Sexo</th>
        <th style="background-color: #E9EBEE;padding: 5px;text-align: center;font-size: 10px;">BI</th>
        <th style="background-color: #E9EBEE;padding: 5px;text-align: center;font-size: 10px;">NIF</th>
        <th style="background-color: #E9EBEE;padding: 5px;text-align: center;font-size: 10px;">Tipo</th>
        <th style="background-color: #E9EBEE;padding: 5px;text-align: center;font-size: 10px;">Endereco</th>
        <th style="background-color: #E9EBEE;padding: 5px;text-align: center;font-size: 10px;">Contacto</th>
        <th style="background-color: #E9EBEE;padding: 5px;text-align: center;font-size: 10px;">Data Cadastrado</th>
        <th style="background-color: #E9EBEE;padding: 5px;text-align: center;font-size: 10px;">Efetuar Emprestimo</th>
      </thead>
        <?php
          if ($modelsFornecedor) {

                foreach ($modelsFornecedor as $key => $fornecedor) {
        ?>
                  <div class="col-md-4">
                    <tbody>
                      <a href="<?= Url::to(['fornecedor/view','id'=>$fornecedor['id']]); ?>" class="image-popup" title="">
                        <tr>
                          <td>
                            <a href="<?= Url::to(['fornecedor/create','id'=>$fornecedor['id']]); ?>" class="image-popup" title="">
                                <img height="60px" width="60px" src="<?php echo Yii::getAlias('@web').'/'.$fornecedor['photo'] ?>" class="thumb-img" title="<?= $fornecedor['nome']; ?>" alt="<?= $fornecedor['nome']; ?>" width="230" height='230'>
                            </a>
                          </td>

                          <td>
                            <?= $fornecedor['nome']; ?>
                          </td>

                          <td>
                            <?= $fornecedor['sobrenome']; ?>
                          </td>

                          <td>
                            <?= $fornecedor['sexo']; ?>
                          </td>

                          <td>
                            <?= $fornecedor['bi']; ?>
                          </td>

                          <td>
                            <?= $fornecedor['nif']; ?>
                          </td>

                          <td>
                            <?= $fornecedor['tipo']; ?>
                          </td>

                          <td>
                            <?= $fornecedor['endereco']; ?>
                          </td>

                          <td>
                            <?= $fornecedor['telefone']; ?>
                          </td>

                          <td>
                            <?= $fornecedor['data_registo']; ?>
                          </td>

                          <td>
                            <?= Html::a('', ['create', 'id' => $fornecedor['id']], [
                                'class' => 'btn btn-primary fa fa-edit'
                            ]) ?>
                          </td>
                        </tr>
                      </a>
                    </tbody>
                  </div>
              <?php
                }
              ?>

              <th style="background-color: #E9EBEE;padding: 5px;text-align: center;font-size: 10px;">Foto</th>
              <th style="background-color: #E9EBEE;padding: 5px;text-align: center;font-size: 10px;">Nome</th>
              <th style="background-color: #E9EBEE;padding: 5px;text-align: center;font-size: 10px;">Sobrenome</th>
              <th style="background-color: #E9EBEE;padding: 5px;text-align: center;font-size: 10px;">Sexo</th>
              <th style="background-color: #E9EBEE;padding: 5px;text-align: center;font-size: 10px;">BI</th>
              <th style="background-color: #E9EBEE;padding: 5px;text-align: center;font-size: 10px;">NIF</th>
              <th style="background-color: #E9EBEE;padding: 5px;text-align: center;font-size: 10px;">Tipo</th>
              <th style="background-color: #E9EBEE;padding: 5px;text-align: center;font-size: 10px;">Endereco</th>
              <th style="background-color: #E9EBEE;padding: 5px;text-align: center;font-size: 10px;">Contacto</th>
              <th style="background-color: #E9EBEE;padding: 5px;text-align: center;font-size: 10px;">Data Cadastrado</th>
              <th style="background-color: #E9EBEE;padding: 5px;text-align: center;font-size: 10px;">Efetuar Emprestimo</th>
            </table>
          <?php
          }
          ?>
  </div>
</div>
