<?php
/**
 * Created by PhpStorm.
 * User: ducngoc
 * Date: 22/10/2016
 * Time: 17:46
 */

namespace frontend\modules\order\services;
class CartItemClass
{
  private $product;
  private $quanlity;
  public function __construct(CartItem $product,$quanlity=1)
  {
    $this->product = $product;
    $this->quanlity = $quanlity;
  }
  public function getProduct(){
    return $this->product;
  }
  public function getQuanlity(){
    return $this->quanlity;
  }
  public function getUnitPrice(){
    return $this->product->getPrice()*$this->quanlity;
  }
  public function downQuantity(){
    if($this->quanlity > 1) {
      $this->quanlity = $this->quanlity - 1;
    }
  }
  public function upQuantity(){
    $this->quanlity = $this->quanlity + 1;
  }
}