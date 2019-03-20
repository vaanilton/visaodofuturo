<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.css',
        'css/style.css',
        'css/font-awesome.css',
        'css/popuo-box.css',
        //'css/lightbox.css',
        'css/flexslider.css',
    ];
    public $js = [
      'js/jquery-2.1.4.min.js',
      'js/bootstrap.js',
      //'js/lightbox-plus-jquery.min.js',
      'js/numscroller-1.0.js',
      'js/responsiveslides.min.js',
      'js/jquery.magnific-popup.js',
      'js/jquery.vide.min.js',
      'js/SmoothScroll.min.js',
      'js/move-top.js',
      'js/easing.js',
      'js/jquery.flexslider.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
