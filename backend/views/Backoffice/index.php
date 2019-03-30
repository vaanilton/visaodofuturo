<?php
use yii\helpers\Html;
?>

<?php function shortdata($string, $len) {
    $string = strip_tags($string);
    $i = $len;
    while ($i < strlen($string)) {
        if ($string[$i] == ' ') {
            $string = substr($string, 0, $i) . "...";
            return $string;
        }
        $i++;
    }
    return $string;
 } ?>

<div class="row">
  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="x_panel tile fixed_height_320">
      <div class="x_title" style="background-color: #D0DCE0;padding: 8px;font-size: 14px;
                  font-family: Open Sans; letter-spacing:2px;
                  vertical-align: baseline; line-height: 32px;
                  font-style: negrito ;text-align: justify;">
        <h2 >Area de Intervenção</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <table class="table table-striped table-hover">
          <thead>
            <th>Titulo</th>
            <th>Descrição</th>
            <th>Ação</th>
          </thead>

          <?php if($modelsAreaIntervensao){
            foreach ($modelsAreaIntervensao as $key => $area) { ?>

              <tbody>
                <td>
                  <?= $area['titulo']; ?>
                </td>
                <td>
                  <?= shortdata($area['descricao'], 20); ?>
                </td>
                <th>
                  <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                    <?= Html::a('', ['area-intervencao/update', 'id' => $area['id']], [
                    'class' => 'btn btn-primary fa fa-edit'
                    ]) ?>
                  </div>
                  <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                    <?= Html::a('', ['area-intervencao/apagar', 'id' => $area['id']], [
                        'class' => 'btn btn-danger fa fa-trash-o',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                  </div>
                </th>
              </tbody>

           <?php }} ?>

        </table>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="x_panel tile fixed_height_320 overflow_hidden">
      <div class="x_title" style="background-color: #D0DCE0;padding: 8px;font-size: 14px;
                  font-family: Open Sans; letter-spacing:2px;
                  vertical-align: baseline; line-height: 32px;
                  font-style: negrito ;text-align: justify;">
        <h2>Equipa de Gestão</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <table class="" style="width:100%">
          <tr>
            <th style="width:37%;">
              <p>Foto</p>
            </th>
            <th>
              <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                <p class="">Nome</p>
              </div>

            </th>
            <th style="width:37%;">
              <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                <p class="">Cargo</p>
              </div>
            </th>
            <th style="width:37%;">
              <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                <p class="">Ação</p>
              </div>
            </th>

          </tr>

          <?php
            if($modelsEquipa){
              foreach ($modelsEquipa as $key => $equipa) {
           ?>
              <div class="col-md-4 ">
                <tbody>
                  <tr>
                      <td>
                        <img height="60px" width="60px" src="<?php echo Yii::getAlias('@web').'/'.$equipa['photo'] ?>" class="thumb-img" title="<?= $equipa['nome']; ?>" alt="<?= $equipa['nome']; ?>" width="230" height='230'>
                      </td>

                      <td> <?php echo $equipa['nome']?> </td>

                      <td> <?php echo $equipa['tipo']?> </td>

                      <th>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                          <?= Html::a('', ['equipa/update', 'id' => $equipa['id']], [
                          'class' => 'btn btn-primary fa fa-edit'
                          ]) ?>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                          <?= Html::a('', ['equipa/apagar', 'id' => $equipa['id']], [
                              'class' => 'btn btn-danger fa fa-trash-o',
                              'data' => [
                                  'confirm' => 'Are you sure you want to delete this item?',
                                  'method' => 'post',
                              ],
                          ]) ?>
                        </div>
                      </th>

                  </tr>
                </tbody>
              </div>
            <?php
                }
              }
            ?>

        </table>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="x_panel tile fixed_height_320">
      <div class="x_title" style="background-color: #D0DCE0;padding: 8px;font-size: 14px;
                  font-family: Open Sans; letter-spacing:2px;
                  vertical-align: baseline; line-height: 32px;
                  font-style: negrito ;text-align: justify;">
        <h2>Galeria Slide Historial</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <table class="table table-striped table-hover">
          <thead>
            <th>Foto</th>
            <th>Descricao</th>
            <th>Ação</th>
          </thead>

          <?php
            if($modelsGaleria){
              foreach ($modelsGaleria as $key => $equipa) {
           ?>
              <div class="col-md-4 ">
                <tbody>
                  <tr>
                    <td>
                      <img height="60px" width="60px" src="<?php echo Yii::getAlias('@web').'/'.$equipa['photo'] ?>" class="thumb-img" title="" alt="" width="230" height='230'>
                    </td>

                    <td>
                      <?= shortdata($equipa['descricao'], 20); ?>
                    </td>

                    <th>
                      <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <?= Html::a('', ['galeria/update', 'id' => $equipa['id']], [
                        'class' => 'btn btn-primary fa fa-edit'
                        ]) ?>
                      </div>
                      <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                        <?= Html::a('', ['galeria/apagar', 'id' => $equipa['id']], [
                            'class' => 'btn btn-danger fa fa-trash-o',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                      </div>
                    </th>

                  </tr>
                </tbody>
              </div>
            <?php
                }
              }
            ?>

        </table>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="x_panel tile fixed_height_320">
      <div class="x_title" style="background-color: #D0DCE0;padding: 8px;font-size: 14px;
                  font-family: Open Sans; letter-spacing:2px;
                  vertical-align: baseline; line-height: 32px;
                  font-style: negrito ;text-align: justify;">
        <h2>Area Especialisação</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <table class="table table-striped table-hover">
          <thead>
            <th>Titulo</th>
            <th>Descrição</th>
            <th>Ação</th>
          </thead>

          <?php if($modelsEspecialisasao){
            foreach ($modelsEspecialisasao as $key => $area) { ?>

              <tbody>
                <td>
                  <?= $area['titulo']; ?>
                </td>
                <td>
                  <?= shortdata($area['descricao'], 20); ?>
                </td>
                <th>
                  <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                    <?= Html::a('', ['area-especialisacao/update', 'id' => $area['id']], [
                    'class' => 'btn btn-primary fa fa-edit'
                    ]) ?>
                  </div>
                  <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                    <?= Html::a('', ['area-especialisacao/apagar', 'id' => $area['id']], [
                        'class' => 'btn btn-danger fa fa-trash-o',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                  </div>
                </th>
              </tbody>

           <?php }} ?>

        </table>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="x_panel tile fixed_height_320 overflow_hidden">
      <div class="x_title" style="background-color: #D0DCE0;padding: 8px;font-size: 14px;
                  font-family: Open Sans; letter-spacing:2px;
                  vertical-align: baseline; line-height: 32px;
                  font-style: negrito ;text-align: justify;">
        <h2>Intervenção Social</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <table class="table table-striped table-hover">
          <thead>
            <th>Foto</th>
            <th>Nome</th>
            <th>Descricao</th>
            <th>Ação</th>
          </thead>

          <?php
            if($modelsIntervensaoSocial){
              foreach ($modelsIntervensaoSocial as $key => $equipa) {
           ?>
              <div class="col-md-4 ">
                <tbody>
                  <tr>
                      <td>
                        <img height="60px" width="60px" src="<?php echo Yii::getAlias('@web').'/'.$equipa['photo'] ?>" class="thumb-img" title="<?= $equipa['nome']; ?>" alt="<?= $equipa['nome']; ?>" width="230" height='230'>
                      </td>

                      <td> <?php echo $equipa['nome']?> </td>

                      <td>
                        <?= shortdata($equipa['descricao'], 20); ?>
                      </td>

                      <th>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                          <?= Html::a('', ['intervensao-social/update', 'id' => $equipa['id']], [
                          'class' => 'btn btn-primary fa fa-edit'
                          ]) ?>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                          <?= Html::a('', ['intervensao-social/apagar', 'id' => $equipa['id']], [
                              'class' => 'btn btn-danger fa fa-trash-o',
                              'data' => [
                                  'confirm' => 'Are you sure you want to delete this item?',
                                  'method' => 'post',
                              ],
                          ]) ?>
                        </div>
                      </th>

                  </tr>
                </tbody>
              </div>
            <?php
                }
              }
            ?>

        </table>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="x_panel tile fixed_height_320">
      <div class="x_title" style="background-color: #D0DCE0;padding: 8px;font-size: 14px;
                  font-family: Open Sans; letter-spacing:2px;
                  vertical-align: baseline; line-height: 32px;
                  font-style: negrito ;text-align: justify;">
        <h2>Informações de Contacto</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <table class="table table-striped table-hover">
          <thead>
            <th>Telefone</th>
            <th>Localisação</th>
            <th>Hora Funcionamento</th>
            <th>Ação</th>
          </thead>

          <?php
            if($modelsInformacaoContacto){
              foreach ($modelsInformacaoContacto as $key => $equipa) {
           ?>
              <div class="col-md-4 ">
                <tbody>
                  <tr>
                      <td>
                        <?php echo $equipa['telefone']?>
                      </td>

                      <td>
                        <?= shortdata($equipa['localisacao'], 20); ?>
                      </td>

                      <td>
                        <?= shortdata($equipa['hora_funcionamento'], 20); ?>
                      </td>

                      <th>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                          <?= Html::a('', ['informacao-contacto/update', 'id' => $equipa['id']], [
                          'class' => 'btn btn-primary fa fa-edit'
                          ]) ?>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                          <?= Html::a('', ['informacao-contacto/apagar', 'id' => $equipa['id']], [
                              'class' => 'btn btn-danger fa fa-trash-o',
                              'data' => [
                                  'confirm' => 'Are you sure you want to delete this item?',
                                  'method' => 'post',
                              ],
                          ]) ?>
                        </div>
                      </th>

                  </tr>
                </tbody>
              </div>
            <?php
                }
              }
            ?>

        </table>
      </div>
    </div>
  </div>

</div>
