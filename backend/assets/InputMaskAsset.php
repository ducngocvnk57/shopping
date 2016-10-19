<?php
/**
 * Created by PhpStorm.
 * User: ducngoc
 * Date: 15/10/2016
 * Time: 20:41
 */

namespace backend\assets;
use yii\web\AssetBundle;
class InputMaskAsset extends AssetBundle
{
  public $sourcePath = '@bower/jquery.inputmask/dist';
  public $css = [
  ];
  public $js = [
      'jquery.inputmask.bundle.js',
  ];
  public function init()
  {
    parent::init();
  }
}