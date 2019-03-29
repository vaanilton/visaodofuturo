<?php
use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;
use common\models\User;
use backend\models\profile;
use backend\models\Fornecedor;
use backend\models\Producao;
use miloschuman\highcharts\Highcharts;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\helpers\Html;
?>
<br>
<div class="site-index">
  <div class="row top_tiles">
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats" style="background-color: #E9EBEE;padding: 5px;text-align: center;font-size: 10px;color: white;">
        <div class="icon"><i class="fa fa-users blue"></i></div>
        <div class="count blue"><?=$modelsTotalUtilizador?></div>
        <h3>Utilizador</h3>
        <p></p>
      </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12" >
      <div class="tile-stats" style="background-color: #E9EBEE;padding: 5px;text-align: center;font-size: 10px;color: white;">
        <div class="icon"><i class="fa fa-male blue"></i></div>
        <?php
          if($Utilizador_masculino){
        ?>
        <div class="count blue"><?=$Utilizador_masculino?></div>
        <?php
          }
        ?>
        <h3>Masculino</h3>
        <p></p>
      </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats" style="background-color: #E9EBEE;padding: 5px;text-align: center;font-size: 10px;color: white;">
        <div class="icon"><i class="fa fa-female blue"></i></div>
        <?php
          if($Utilizador_feminino){
        ?>
        <div class="count blue"><?=$Utilizador_feminino?></div>
        <?php
          }
        ?>
        <h3>Feminino</h3>
        <p></p>
      </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12" >
      <div class="tile-stats" style="background-color: #E9EBEE;padding: 5px;text-align: center;font-size: 10px;color: white;">
        <div class="icon"><i class="fa fa-lock blue"></i></div>
        <div class="count blue"><?=User::find()->where(['status'=>0])->count()?></div>
        <h3>Bloquiado</h3>
        <p></p>
      </div>
    </div>
  </div>

  <div class="row top_tiles">
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-users red"></i></div>
        <div class="count blue"><?=Fornecedor::find()->where(['status'=>10])->count()?></div>
        <h3>Colaborador</h3>
        <p></p>
      </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-male red"></i></div>
        <div class="count blue"><?=Fornecedor::find()->where(['status'=>10, 'tipo'=>['Agricultor','Agricultor-Pastor']])->count()?></div>
        <h3>Agricultor</h3>
        <p></p>
      </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-male red"></i></div>
        <div class="count blue"><?=Fornecedor::find()->where(['status'=>10, 'tipo'=>['Pastor','Agricultor-Pastor']])->count()?></div>
        <h3>Pastor</h3>
        <p></p>
      </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-lock red"></i></div>
        <div class="count blue"><?=Fornecedor::find()->where(['status'=>0])->count()?></div>
        <h3>Bloquiado</h3>
        <p></p>
      </div>
    </div>
  </div>

<br>
  <div class="x_panel" style="">
    <?php
      $cultivo_ = array();
      $arraycultivo_ = array();
      if($modelsCultivo){
        foreach ($modelsCultivo as $key => $cultivo) {

          $arraycultivo_ [$key] =[
            $cultivo['nome_do_planteio'],
            (int)$cultivo['top']
          ];

        }
        /*$data1 = $arraycultivo_;
        $data = [
            ['Bananas', 8],
            ['Kiwi', 3],
            ['Mixed nuts', 1],
            ['Oranges', 6],
            ['Apples', 8],
            ['Pears', 4],
            ['Clementines', 4],
            ['Reddish (bag)', 1],
            ['Grapes (bunch)', 1]
        ];
        echo "<pre>";
        print_r($data1);
        die;*/
      }
    ?>

    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="x_panel fixed_height_260">
        <div class="x_title">
          <h2><small>Sessions</small></h2>
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
          <?php
            echo Highcharts::widget([
              'options' => [
                'chart'=> [
                    'type'=> 'pie',
                    'options3d'=> [
                        'enabled'=> true,
                        'alpha'=> 45
                    ]
                ],
                'title'=> [
                    'text'=> 'Grafico Cultivos'
                ],
                'subtitle'=> [
                    'text'=> '3D'
                ],
                'plotOptions'=> [
                    'pie'=> [
                        'innerSize'=> 100,
                        'depth'=> 45
                    ]
                ],
                'series'=> [
                    [
                      'name'=> 'Quantidade Cultivo',
                      'data'=> $arraycultivo_

                  ]
                ]
              ]
            ]);
          ?>
        </div>
      </div>
    </div>

    <?php
      $gado_ = array();
      $arraygado_ = array();
      if($modelsGado){
        foreach ($modelsGado as $key => $gado) {

          $arraygado_ [$key] =[
            $gado['nome'],
            (int)$gado['quantidade']
          ];

        }
        /*$data1 = $arraycultivo_;
        $data = [
            ['Bananas', 8],
            ['Kiwi', 3],
            ['Mixed nuts', 1],
            ['Oranges', 6],
            ['Apples', 8],
            ['Pears', 4],
            ['Clementines', 4],
            ['Reddish (bag)', 1],
            ['Grapes (bunch)', 1]
        ];
        echo "<pre>";
        print_r($data1);
        die;*/
      }
    ?>

    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="x_panel fixed_height_260">
        <div class="x_title">
          <h2><small>Sessions</small></h2>
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
          <?php
            echo Highcharts::widget([
              'options' => [
                'chart'=> [
                    'type'=> 'pie',
                    'options3d'=> [
                        'enabled'=> true,
                        'alpha'=> 45
                    ]
                ],
                'title'=> [
                    'text'=> 'Grafico Gado'
                ],
                'subtitle'=> [
                    'text'=> '3D'
                ],
                'plotOptions'=> [
                    'pie'=> [
                        'innerSize'=> 100,
                        'depth'=> 45
                    ]
                ],
                'series'=> [
                    [
                      'name'=> 'Quantidade Rebanho',
                      'data'=> $arraygado_
                  ]
                ]
              ]
            ]);
          ?>
        </div>
      </div>
    </div>
  </div>

  <div class="x_panel" style="">
    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="x_panel fixed_height_260">
        <div class="x_title">
          <h2>
            Cultivo
            <small>Sessions</small>
          </h2>
          <ul class="nav navbar-right panel_toolbox">
            <?php /*
            <li>
              <?= Html::a('Novo Cultivo', ['cultivo/create'], ['class' => 'btn btn-success']) ?>
            </li>
            */ ?>
            <li>
              <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>

          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">

          <table class="table table-striped table-hover">
            <thead>
              <th style="background-color: #E9EBEE;padding: 5px;text-align: center;font-size: 10px;">Nome</th>
              <th style="background-color: #E9EBEE;padding: 5px;text-align: center;font-size: 10px;">Quantidade Cultivo</th>
              <th style="background-color: #E9EBEE;padding: 5px;text-align: center;font-size: 10px;">Quantidade Producao</th>
            </thead>

            <?php
              if ($modelsProducaoAgricula) {
                  foreach ($modelsProducaoAgricula as $key => $fornecedor) {
                  ?>
                    <div class="col-md-4 ">
                      <tbody>

                        <tr>

                          <td class ="text-center">
                            <br>
                            <a href="<?= Url::to(['fornecedor/view','id'=>$fornecedor['id']]); ?>" class="image-popup" title="">
                              <?= $fornecedor['nome'].' '.$fornecedor['sobrenome']; ?>
                            </a>
                          </td>

                          <td class ="text-center">
                            <br>
                            <?= $fornecedor['top']; ?>
                          </td>
                          <td class ="text-center">
                            <br>
                            <?= $fornecedor['producao']; ?>
                          </td>
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
    <div class="col-md-6 col-sm-6 col-xs-12" >
      <div class="x_panel fixed_height_260">
        <div class="x_title">
          <h2>
            Gado
            <small>Sessions</small>
          </h2>
          <ul class="nav navbar-right panel_toolbox">
            <?php /*
            <li>
              <?= Html::a('Create Gado', ['gado/create'], ['class' => 'btn btn-success']) ?>
            </li>
            <li>
            */ ?>
              <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>

          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">

          <table class="table table-striped table-hover" style="width:100%;">
            <thead>
              <th style="background-color: #E9EBEE;padding: 5px;text-align: center;font-size: 10px;">Nome</th>
              <th style="background-color: #E9EBEE;padding: 5px;text-align: center;font-size: 10px;">Quantidade Rebanho</th>
              <th style="background-color: #E9EBEE;padding: 5px;text-align: center;font-size: 10px;">Quantidade Producao</th>
            </thead>

            <?php
              if($modelsProducaoGado) {
                foreach ($modelsProducaoGado as $key => $fornecedor) {
                ?>
                  <div class="col-md-4 ">
                    <tbody>
                      <tr>

                        <td class ="text-center">
                          <br>
                          <a href="<?= Url::to(['fornecedor/view','id'=>$fornecedor['id']]); ?>" class="image-popup" title="">
                            <?= $fornecedor['nome'].' '.$fornecedor['sobrenome']; ?>
                          </a>
                        </td>

                        <td class ="text-center">
                          <br>
                          <?= $fornecedor['top']; ?>
                        </td>

                        <td class ="text-center">
                          <br>
                          <?= $fornecedor['producao']; ?>
                        </td>
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




    <?php
    //Pegar Cultivo com total de producao
    $cultivo = array();
    $cultivo_producao = array();
    if($modelsProducaoAgricula){
      foreach ($modelsProducaoAgricula as $key => $dados) {
        $cultivo_producao[$key] = $cultivo = [
          'name'=>$dados['nome'],
          'data'=> [(int)$dados['top'], (int)$dados['producao']]
        ];
      }
    }
    ?>
    <div class="x_panel" style="">
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel fixed_height_260">
          <div class="x_title">
            <h2>Cultivo Producao</h2>
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
            <?php
              echo Highcharts::widget([
               'options' => [
                 'chart' => [
                    'type' => "column"
                  ],
                  'title' => ['text' => 'Total Cultivo e Producao'],
                  'xAxis' => [
                     'categories' => ['Cultivo', 'Producao']
                  ],
                  'yAxis' => [
                     'title' => ['text' => 'TOTAL']
                  ],
                  'series' => $cultivo_producao
               ]
            ]);
            ?>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel fixed_height_260">
          <div class="x_title">
            <h2>Cultivo Producao <small>Sessions</small></h2>
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
            <?php
              echo Highcharts::widget([
               'options' => [

                  'title' => ['text' => 'Total Cultivo e Producao'],
                  'xAxis' => [
                     'categories' => ['Cultivo', 'Producao']
                  ],
                  'yAxis' => [
                     'title' => ['text' => 'TOTAL']
                  ],
                  'series' => $cultivo_producao
               ]
            ]);
            ?>
          </div>
        </div>
      </div>
    </div>

      <?php
      //Pegar Gado com total de producao
      $gado = array();
      $gado_producao = array();
      if($modelsProducaoGado){
        foreach ($modelsProducaoGado as $key => $dados) {
          $gado_producao[$key] = $gado = [
            'name'=>$dados['nome'],
            'data'=> [(int)$dados['top'], (int)$dados['producao']]
          ];
        }
      }
      ?>
    <div class="x_panel">
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel fixed_height_260">
          <div class="x_title">
            <h2>Gado Producao</h2>
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
            <?php
              echo Highcharts::widget([
               'options' => [
                 'chart' => [
                    'type' => "column"
                  ],
                  'title' => ['text' => 'Total Rebanho e Producao'],
                  'xAxis' => [
                     'categories' => ['Gado', 'Producao']
                  ],
                  'yAxis' => [
                     'title' => ['text' => 'TOTAL']
                  ],
                  'series' => $gado_producao
               ]
            ]);
            ?>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel fixed_height_260">
          <div class="x_title">
            <h2>Gado Producao<small>Sessions</small></h2>
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
            <?php
              echo Highcharts::widget([
               'options' => [

                  'title' => ['text' => 'Total Rebanho e Producao'],
                  'xAxis' => [
                     'categories' => ['Gado', 'Producao']
                  ],
                  'yAxis' => [
                     'title' => ['text' => 'TOTAL']
                  ],
                  'series' => $gado_producao
               ]
            ]);
            ?>
          </div>
        </div>
      </div>
    </div>

      <div class="x_panel col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel fixed_height_260">
          <div class="x_title">
            <h2>Profile Settings <small>Sessions</small></h2>
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
            <?php
              echo Highcharts::widget([
                'options' => [
                  'chart'=> [
                      'type'=> 'column'
                  ],
                  'title'=> [
                      'text'=> 'Monthly Average Rainfall'
                  ],
                  'subtitle'=> [
                      'text'=> 'Source: WorldClimate.com'
                  ],
                  'xAxis'=> [
                      'categories'=> [
                          'Jan',
                          'Feb',
                          'Mar',
                          'Apr',
                          'May',
                          'Jun',
                          'Jul',
                          'Aug',
                          'Sep',
                          'Oct',
                          'Nov',
                          'Dec'
                      ],
                      'crosshair'=> true
                  ],
                  'yAxis'=> [
                      'min'=> 0,
                      'title'=> [
                          'text'=> 'Rainfall (mm)'
                      ]
                  ],
                  'tooltip'=> [
                      'headerFormat'=> '<span style="font-size:10px">{point.key}</span><table>',
                      'pointFormat'=> '<tr><td style="color:{series.color};padding:0">{series.name}: </td></tr>',
                      'footerFormat'=> '</table>',
                      'shared'=> true,
                      'useHTML'=> true
                  ],
                  'plotOptions'=> [
                      'column'=> [
                          'pointPadding'=> 0.2,
                          'borderWidth'=> 0
                      ]
                  ],
                  'series'=> [
                    [
                      'name'=> 'Tokyo',
                      'data'=> [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

                    ],
                    [
                      'name'=> 'New York',
                      'data'=> [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

                    ],
                    [
                      'name'=> 'London',
                      'data'=> [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

                    ],
                    [
                      'name'=> 'Berlin',
                      'data'=> [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

                    ]
                ]
              ]
              ]);
              ?>
          </div>
        </div>
      </div>
      <div class="x_panel col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel fixed_height_260">
          <div class="x_title">
            <h2>Profile Settings <small>Sessions</small></h2>
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
            <?php
              echo Highcharts::widget([
                'options' => [
                  'chart'=> [
                      'type'=> 'column'
                  ],
                  'title'=> [
                      'text'=> 'Monthly Average Rainfall'
                  ],
                  'subtitle'=> [
                      'text'=> 'Source: WorldClimate.com'
                  ],
                  'xAxis'=> [
                      'categories'=> [
                          'Jan',
                          'Feb',
                          'Mar',
                          'Apr',
                          'May',
                          'Jun',
                          'Jul',
                          'Aug',
                          'Sep',
                          'Oct',
                          'Nov',
                          'Dec'
                      ],
                      'crosshair'=> true
                  ],
                  'yAxis'=> [
                      'min'=> 0,
                      'title'=> [
                          'text'=> 'Rainfall (mm)'
                      ]
                  ],
                  'tooltip'=> [
                      'headerFormat'=> '<span style="font-size:10px">{point.key}</span><table>',
                      'pointFormat'=> '<tr><td style="color:{series.color};padding:0">{series.name}: </td></tr>',
                      'footerFormat'=> '</table>',
                      'shared'=> true,
                      'useHTML'=> true
                  ],
                  'plotOptions'=> [
                      'column'=> [
                          'pointPadding'=> 0.2,
                          'borderWidth'=> 0
                      ]
                  ],
                  'series'=> [
                    [
                      'name'=> 'Miranda',
                      'data'=> [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

                    ],
                    [
                      'name'=> 'Ne',
                      'data'=> [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

                    ],
                    [
                      'name'=> 'Va',
                      'data'=> [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

                    ],
                    [
                      'name'=> 'Vanilde',
                      'data'=> [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

                    ],
                    [
                      'name'=> 'Anilton',
                      'data'=> [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

                    ],
                ]
              ]
              ]);
            ?>
          </div>
        </div>
      </div>

    <div class="x_panel">
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel fixed_height_260">
          <div class="x_title">
            <h2>Profile Settings <small>Sessions</small></h2>
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
            <?php
              echo Highcharts::widget([
                'options' => [
                  'chart'=> [
                      'type'=> 'pie',
                      'options3d'=> [
                          'enabled'=> true,
                          'alpha'=> 45,
                          'beta'=> 0
                      ]
                  ],
                  'title'=> [
                      'text'=> 'Browser market shares at a specific website, 2014'
                  ],
                  'tooltip'=> [
                      'pointFormat'=> '{series.name}: <b>{point.percentage:.1f}%</b>'
                  ],
                  'plotOptions'=> [
                      'pie'=> [
                          'allowPointSelect'=> true,
                          'cursor'=> 'pointer',
                          'depth'=> 35,
                          'dataLabels'=> [
                              'enabled'=> true,
                              'format'=> '{point.name}'
                          ]
                      ]
                  ],
                  'series'=> [
                    [
                      'type'=> 'pie',
                      'name'=> 'Browser share',
                      'data'=> [
                          ['Firefox', 45.0],
                          ['IE', 26.8],
                          [
                              'name'=> 'Chrome',
                              'y'=> 12.8,
                              'sliced'=> true,
                              'selected'=> true
                          ],
                          ['Safari', 8.5],
                          ['Opera', 6.2],
                          ['Others', 0.7]
                      ]
                    ]
                  ]
                ]
              ]);
            ?>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel fixed_height_260">
          <div class="x_title">
            <h2>Profile Settings <small>Sessions</small></h2>
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
            <?php
              echo Highcharts::widget([
                'options' => [
                  'chart'=> [
                      'type'=> 'pie',
                      'options3d'=> [
                          'enabled'=> true,
                          'alpha'=> 45,
                          'beta'=> 0
                      ]
                  ],
                  'title'=> [
                      'text'=> 'Browser market shares at a specific website, 2014'
                  ],
                  'tooltip'=> [
                      'pointFormat'=> '{series.name}: <b>{point.percentage:.1f}%</b>'
                  ],
                  'plotOptions'=> [
                      'pie'=> [
                          'allowPointSelect'=> true,
                          'cursor'=> 'pointer',
                          'depth'=> 35,
                          'dataLabels'=> [
                              'enabled'=> true,
                              'format'=> '{point.name}'
                          ]
                      ]
                  ],
                  'series'=> [
                    [
                      'type'=> 'pie',
                      'name'=> 'Browser share',
                      'data'=> [
                          ['Firefox', 45.0],
                          ['IE', 26.8],
                          [
                              'name'=> 'Chrome',
                              'y'=> 12.8,
                              'sliced'=> true,
                              'selected'=> true
                          ],
                          ['Safari', 8.5],
                          ['Opera', 6.2],
                          ['Others', 0.7]
                      ]
                    ]
                  ]
                ]
              ]);
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
