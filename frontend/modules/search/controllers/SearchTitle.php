<?php
namespace frontend\modules\search\controllers;

class SearchTitle implements SearchInterface{
  public static function search($value="",$product=null){
      return $query = $product->andwhere(['like', 'title', $value]);
  }
}
?>
