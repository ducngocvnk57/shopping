<?php
use frontend\modules\order\services\CartService;
use yii\helpers\Url;

$cart = new CartService();
?>
<div class="site-login">
  <div class="row" style="width:80%;margin:auto">
      <div class="row col-lg-8">
          <table>
             <tbody style="font-size:11px">
               <tr>
                 <p style="font-weight: bold;"> Customer Info :</p><br>
                 Name : <?= $user->name?><br>
                 Email : <?= $user->email?><br>
                 Address : <?=$user->address?><br>
                 Phone Number : <?=$user->phone?><br>
                 <br>
                 <br>
              <tr>
              <tr>
                 <p style="font-weight: bold;"> Item Info :</p><br>
                <table class="table table-condensed">
                  <thead>
                  <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantily</th>
                    <th>Unit Price</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($cart->getCartItems() as $item) {
                      $product = $item->getProduct();
                    ?>
                  <tr>
                    <td class="col-sm-5 col-lg-5 col-md-5">
                      <div class="cart_items">
                        <div class="thumbnail">
                          <figure class="images"><img src="<?=$product->image;?>" alt=""></figure>
                        </div>
                        <div class="caption">
                          <h4><?=$product->getTitle()?></a>
                          </h4>
                        </div>
                      </div>
                    </td>
                    <td><h4><?=number_format($product->getPrice())?> VNĐ</h4></td>
                    <td class="cart_item_action col-sm-2 col-lg-2 col-md-2">
                      <p class="cart_item_quanlity"><?=$item->getQuanlity()?></p>
                    </td>
                    <td class="cart_item_price"><?=number_format($item->getUnitPrice())?> VNĐ</td>
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </tr>
             </tbody>
          </table>
          <p class="cart_total_price">Total : <?=number_format($cart->totalPrice())?> VNĐ</p><br>
          <a href="<?=Url::to(['checkout/complete'])?>"><button type="button" class="btn btn-primary">Confirm</button></a>
          <button onclick="goBack()">Go Back</button>
          <script>
          function goBack() {
              window.history.back();
          }
          </script>
      </div>
  </div>
</div>
