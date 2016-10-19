<?php
/**
 * Created by PhpStorm.
 * User: ducngoc
 * Date: 19/10/2016
 * Time: 11:20
 */

namespace frontend\services;


class CartService
{
  private $session;
  private $product = [];
  public function __construct(){
    $this->session = Yii::$app->session;
    if($this->session->get("cart")){
      $this->product = $this->session->get("cart");
    }
  }
  private function setProductQuantity($ProductClass, $quantity){

  }

  public function addProduct($productClassId, $quantity = 1)
  {

  }
  public function getProductQuantity($productClassId)
  {

  }
  public function removeProduct($productClassId){

  }

  public function upProductQuantity($productClassId)
  {

  }
  public function downProductQuantity($productClassId)
  {

  }

  public function clear(){

  }

}