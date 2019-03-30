<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class JqueryAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

        /*'css/status.css',
        'css/site.css',
        'css/bootstrap.min.css',
        'css/font-awesome.min.css',
        'css/nprogress.css',
        'css/green.css',
        'css/bootstrap-progressbar-3.3.4.min.css',
        'css/jqvmap.min.css',
        'css/daterangepicker.css',
        'css/custom.min.css',
        'css/custom.css',
        'css/login.css',
        'css/facebook.css',
        'css/sidebar.css',
        'css/content.css',
        'css/menu.css',
        'css/nav.css',*/

    ];
    public $js = [
      //'js/main.js',

      'js/jquery.js',
      /*'js/bootstrap.min.js',
      'js/fastclick.js',
      'js/nprogress.js',
      'js/Chart.min.js',
      'js/gauge.min.js',
      'js/bootstrap-progressbar.min.js',
      'js/icheck.min.js',
      'js/skycons.js',
      'js/jquery.flot.js',
      'js/jquery.flot.pie.js',
      'js/jquery.flot.time.js',
      'js/jquery.flot.stack.js',
      'js/jquery.flot.resize.js',
      'js/jquery.flot.orderBars.js',
      'js/jquery.flot.spline.min.js',
      'js/curvedLines.js',
      'js/date.js',
      'js/jquery.vmap.js',
      'js/jquery.vmap.world.js',
      'js/jquery.vmap.sampledata.js',
      'js/moment.min.js',
      'js/daterangepicker.js',
      'js/custom.min.js',*/

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
