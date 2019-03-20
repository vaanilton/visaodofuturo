<?php
use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;
use common\models\User;
use backend\models\profile;
use backend\models\Fornecedor;
use miloschuman\highcharts\Highcharts;
?>
<br>
<div class="site-index">
  <div class="row top_tiles">
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-users red"></i></div>
        <div class="count blue"><?=Fornecedor::find()->where(['status'=>10])->count()?></div>
        <h3>Fornecedor</h3>
        <p></p>
      </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-male red"></i></div>
        <div class="count blue"><?=Fornecedor::find()->where(['status'=>10, 'tipo'=>'Agricultor'])->count()?></div>
        <h3>Agricultor</h3>
        <p></p>
      </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-male red"></i></div>
        <div class="count blue"><?=Fornecedor::find()->where(['status'=>10, 'tipo'=>'Pastor'])->count()?></div>
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

  <div class="row">
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
                  'title' => ['text' => 'Fruit Consumption'],
                  'xAxis' => [
                     'categories' => ['Apples', 'Bananas', 'Oranges']
                  ],
                  'yAxis' => [
                     'title' => ['text' => 'Fruit eaten']
                  ],
                  'series' => [
                     ['name' => 'Jane', 'data' => [1, 0, 4]],
                     ['name' => 'John', 'data' => [5, 7, 3]]
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
                  'title' => ['text' => 'Fruit Consumption'],
                  'xAxis' => [
                     'categories' => ['Apples', 'Bananas', 'Oranges']
                  ],
                  'yAxis' => [
                     'title' => ['text' => 'Fruit eaten']
                  ],
                  'series' => [
                     ['name' => 'Jane', 'data' => [1, 0, 4]],
                     ['name' => 'John', 'data' => [5, 7, 3]]
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
                          'alpha'=> 45
                      ]
                  ],
                  'title'=> [
                      'text'=> 'Contents of Highsoft\'s weekly fruit delivery'
                  ],
                  'subtitle'=> [
                      'text'=> '3D donut in Highcharts'
                  ],
                  'plotOptions'=> [
                      'pie'=> [
                          'innerSize'=> 100,
                          'depth'=> 45
                      ]
                  ],
                  'series'=> [
                      [
                        'name'=> 'Delivered amount',
                        'data'=> [
                            ['Bananas', 8],
                            ['Kiwi', 3],
                            ['Mixed nuts', 1],
                            ['Oranges', 6],
                            ['Apples', 8],
                            ['Pears', 4],
                            ['Clementines', 4],
                            ['Reddish (bag)', 1],
                            ['Grapes (bunch)', 1]
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
                          'alpha'=> 45
                      ]
                  ],
                  'title'=> [
                      'text'=> 'Contents of Highsoft\'s weekly fruit delivery'
                  ],
                  'subtitle'=> [
                      'text'=> '3D donut in Highcharts'
                  ],
                  'plotOptions'=> [
                      'pie'=> [
                          'innerSize'=> 100,
                          'depth'=> 45
                      ]
                  ],
                  'series'=> [
                      [
                        'name'=> 'Delivered amount',
                        'data'=> [
                            ['Bananas', 8],
                            ['Kiwi', 3],
                            ['Mixed nuts', 1],
                            ['Oranges', 6],
                            ['Apples', 8],
                            ['Pears', 4],
                            ['Clementines', 4],
                            ['Reddish (bag)', 1],
                            ['Grapes (bunch)', 1]
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
</div>
