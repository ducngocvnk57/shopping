<?php
/**
 * Created by PhpStorm.
 * User: ducngoc
 * Date: 19/10/2016
 * Time: 14:52
 */

namespace frontend\modules\order\models;
use frontend\modules\order\services\CartItem;
use common\models\read\Read;

class Product extends Read implements CartItem
{

  public static function tableName()
  {
    return 'cms_products_item';
  }
  public function getPrice()
  {
    // TODO: Implement getPrice() method.
    return $this->our_price;
  }
  public function getId()
  {
    // TODO: Implement getId() method.
    return $this->id;
  }
  public function getTitle()
  {
    // TODO: Implement getTitle() method.
    return $this->title;
  }
}