<?php
/**
 * Created by PhpStorm.
 * User: ducngoc
 * Date: 19/10/2016
 * Time: 14:52
 */

namespace frontend\modules\order\models;
use yii\db\ActiveRecord;
use frontend\modules\order\services\CartService;
use frontend\modules\order\models\Product;
use frontend\modules\order\models\Member;

class Order extends ActiveRecord
{

  public static function tableName()
  {
      return '{{%order}}';
  }
  public static function saveOrder($cart,$user){
    $order = new Order();
    $order->fullname = $user->name;
    $order->phone = $user->phone;
    $order->address = $user->address;
    $order->email = $user->email;
    $order->data = serialize($cart->getCartItems());
    if($order->save()){
      return true;
    }
    return null;
  }
  public static function test(){
    $cart = new CartService();
    $productClass = Product::findOne(242);
    $user = new Member();
    $user->name = "ngoc";$user->phone ="15677";$user->address = "haha";$user->email ="ducngocvnk57";
    $cart->addProduct($productClass,2);
    Order::saveOrder($cart,$user);
  }
  public static function getOrder(){
    $order = Order::findOne(122);
    var_dump($data);
  }
}
