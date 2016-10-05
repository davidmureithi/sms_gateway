<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class DashboardAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css',
        '//cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css',
        'css/skins/_all-skins.min.css',
        'css/AdminLTE.min.css',
        'plugins/iCheck/flat/blue.cs',
        'css/bootstrap3-wysihtml5.min.css',
        'css/site.css',
    ];
    public $js = [
        'js/bootstrap.min.js',
        '//code.jquery.com/ui/1.11.4/jquery-ui.min.js',
        '//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',
        'plugins/sparkline/jquery.sparkline.min.js',
        'plugins/fastclick/fastklick.min.js',
        'plugins/slimScroll/jquery.slimscroll.min.js',
        'js/app.min.js',
        'js/dashboard.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}