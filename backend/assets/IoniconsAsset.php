<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class IoniconsAsset extends AssetBundle
{
  public $sourcePath = '@bower/ionicons';
  public $css = [
        'css/ionicons.min.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
  public function init()
  {
    parent::init();
  }
}
