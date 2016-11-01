<?php
/**
 * Created by PhpStorm.
 * User: ducngoc
 * Date: 19/10/2016
 * Time: 11:21
 */

namespace frontend\modules\order\services;


interface CartItem
{
  public function getPrice();
  public function getId();
  public function getTitle();
}