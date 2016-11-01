<?php
/**
 * Created by PhpStorm.
 * User: ducngoc
 * Date: 19/10/2016
 * Time: 11:20
 */

namespace frontend\modules\order\services;


use Yii;
use frontend\modules\order\models\Product;
use frontend\modules\order\services\CartItemClass;


class CartService
{
  private $session;
  private $cart_items=[];
  public function __construct(){
    $this->session = Yii::$app->session;
    if($this->session->get("cart")){
      $this->cart_items = $this->session->get("cart");
    }
  }
  private function setProductQuantity($ProductClass, $quantity){

  }
  public function getCartItems(){
    return $this->cart_items;
  }
  public function addProduct($productClass, $quantity = 1)
  {
    if($productClass!=null) {
      $this->cart_items[$productClass->getId()] = new CartItemClass($productClass, $quantity);
    }
    return $this;
  }
  public function getProductQuantity($productClassId)
  {
    return $this->cart_items[$productClassId]->quanlity;
  }
  public function removeProduct($productClassId){
    unset($this->cart_items[$productClassId]);
    return $this;
  }

  public function upProductQuantity($productClassId)
  {
    if($this->cart_items[$productClassId]) {
      $this->cart_items[$productClassId]->upQuantity();
    }
    return $this;
  }
  public function downProductQuantity($productClassId)
  {
    if($this->cart_items[$productClassId]){
      $this->cart_items[$productClassId]->downQuantity();
    }
    return $this;
  }
  public function save(){
    $this->session->set('cart',$this->cart_items);
  }
  public function clear(){
    $this->session->set('cart',null);
  }
  public function totalPrice(){
    $totalPrice = 0;
    foreach ($this->cart_items as $item){
      $totalPrice = $totalPrice + $item->getUnitPrice();
    }
    return $totalPrice;
  }
}