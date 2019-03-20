<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
      'css/admin/bootstrap.min.css',
      'css/admin/nprogress.css',
      'css/admin/green.css',
      'css/admin/bootstrap-progressbar-3.3.4.min.css',
      'css/admin/jqvmap.min.css',
      'css/admin/daterangepicker.css',
      'css/admin/custom.min.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
