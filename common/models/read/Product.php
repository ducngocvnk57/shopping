<?php
/**
 * Created by PhpStorm.
 * User: ducngoc
 * Date: 19/10/2016
 * Time: 14:52
 */

namespace common\models\read;
use frontend\services\CartItem;

class Product extends Read implements CartItem
{

  public static function tableName()
  {
    return 'cms_products_item';
  }
  public function getProductClass()
   {// TODO: Implement getPrice() method.
     return $this->hasMany(ProductClass::className(),['product_id'=>'product_id'])->all();
   }
   public function getPrice(){

   }
}