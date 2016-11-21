<?php
/**
 * Created by PhpStorm.
 * User: ducngoc
 * Date: 19/10/2016
 * Time: 14:52
 */

namespace frontend\modules\order\models;
use yii\db\ActiveRecord;

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
    //var_dump($cart->getCartItems()[246]);die();
    if($order->save()){
      return true;
    }
    return null;
  }
}
