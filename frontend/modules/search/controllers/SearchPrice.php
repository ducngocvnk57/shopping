<?php
namespace frontend\modules\search\controllers;

use backend\models\PriceRange;

class SearchPrice implements SearchInterface{
  public static function search($value="",$product=null){
    $range = PriceRange::findOne($value);
    $max = PriceRange::find()->max('to_price');
    if($range!=null){
      $fromPrice = $range->from_price;
      $toPrice = $range->to_price;
    }else{
      if($value == -1){
        $fromPrice = '0';
        $toPrice = '100000000';
      }else{
        $fromPrice = $max;
        $toPrice = '100000000';
      }
    }
      return $product->andwhere(['between','our_price',$fromPrice,$toPrice]);
    }
}
?>
