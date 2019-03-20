<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class fornecedorAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

        'fornecedorAsset/css/status.css',
        'fornecedorAsset/css/site.css',
        'fornecedorAsset/css/bootstrap.min.css',
        'fornecedorAsset/css/font-awesome.min.css',
        'fornecedorAsset/css/nprogress.css',
        'fornecedorAsset/css/green.css',
        'fornecedorAsset/css/bootstrap-progressbar-3.3.4.min.css',
        'fornecedorAsset/css/jqvmap.min.css',
        'fornecedorAsset/css/daterangepicker.css',
        'fornecedorAsset/css/custom.min.css',
        'fornecedorAsset/css/custom.css',
        'fornecedorAsset/css/login.css',
        'fornecedorAsset/css/facebook.css',
        'fornecedorAsset/css/sidebar.css',
        'fornecedorAsset/css/content.css',
        'fornecedorAsset/css/menu.css',
        'fornecedorAsset/css/nav.css',

    ];
    public $js = [
      'fornecedorAsset/js/main.js',

      //'js/jquery.min.js',
      'fornecedorAsset/js/bootstrap.min.js',
      'fornecedorAsset/js/fastclick.js',
      'fornecedorAsset/js/nprogress.js',
      'fornecedorAsset/js/Chart.min.js',
      'fornecedorAsset/js/gauge.min.js',
      'fornecedorAsset/js/bootstrap-progressbar.min.js',
      'fornecedorAsset/js/icheck.min.js',
      'fornecedorAsset/js/skycons.js',
      'fornecedorAsset/js/jquery.flot.js',
      'fornecedorAsset/js/jquery.flot.pie.js',
      'fornecedorAsset/js/jquery.flot.time.js',
      'fornecedorAsset/js/jquery.flot.stack.js',
      'fornecedorAsset/js/jquery.flot.resize.js',
      'fornecedorAsset/js/jquery.flot.orderBars.js',
      'fornecedorAsset/js/jquery.flot.spline.min.js',
      'fornecedorAsset/js/curvedLines.js',
      'fornecedorAsset/js/date.js',
      'fornecedorAsset/js/jquery.vmap.js',
      'fornecedorAsset/js/jquery.vmap.world.js',
      'fornecedorAsset/js/jquery.vmap.sampledata.js',
      'fornecedorAsset/js/moment.min.js',
      'fornecedorAsset/js/daterangepicker.js',
      'fornecedorAsset/js/custom.min.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
