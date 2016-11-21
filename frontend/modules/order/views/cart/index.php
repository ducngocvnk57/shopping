<?php use yii\helpers\Url ?>
<div class="container">
  <h2>Shopping Cart</h2>
  <table class="table table-condensed">
    <thead>
    <tr>
      <th>Remove</th>
      <th>Product</th>
      <th>Quantily</th>
      <th>Unit Price</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($cart->getCartItems() as $item) {
        $product = $item->getProduct();
      ?>
    <tr>
      <td class="col-sm-1 col-lg-1 col-md-1">
        <div class="cart_remove">
          <a href="<?=Url::to(['cart/remove',"product_id"=>$product->getId()])?>" class="fa fa-times"></a>
        </div>
      </td>
      <td class="col-sm-5 col-lg-5 col-md-5">
        <div class="cart_items">
          <div class="thumbnail">
            <figure class="images"><img src="<?=$product->image;?>" alt=""></figure>
          </div>
          <div class="caption">
            <h4><?=number_format($product->getPrice())?> VNĐ</h4>
            <h4><?=$product->getTitle()?></a>
            </h4>
          </div>
        </div>
      </td>
      <td class="cart_item_action col-sm-2 col-lg-2 col-md-2">
        <p class="cart_item_quanlity"><?=$item->getQuanlity()?></p>
        <ul>
          <li><a href="<?=Url::to(['cart/down',"product_id"=>$product->getId()])?>"><i class="fa fa-minus" aria-hidden="true"></i></a></li>
          <li><a href="<?=Url::to(['cart/up',"product_id"=>$product->getId()])?>"><i class="fa fa-plus" aria-hidden="true"></i></a></li>
        </ul>
      </td>
      <td class="cart_item_price"><?=number_format($item->getUnitPrice())?> VNĐ</td>
    </tr>
    <?php } ?>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td><p class="cart_total_price">Total : <?=number_format($cart->totalPrice())?> VNĐ</td>
    </tbody>
  </table>
  <ul class="next_action">
    <li><a href="<?=Url::to(['checkout/index'])?>"><button type="button" class="btn btn-danger">Checkout</button></a></li>
    <li><a href="<?=Url::to(['site/index'])?>"><button type="button" class="btn btn-primary">Continue Shopping</button></a></li>
  </ul>
</div>
<?php
/**
 * Created by PhpStorm.
 * User: ducngoc
 * Date: 22/10/2016
 * Time: 23:38
 */

?>
