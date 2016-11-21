<?php
use frontend\modules\order\services\CartService;
use yii\helpers\Url;
?>
<div class="site-login">
  <div class="row" style="width:80%;margin:auto">
      <div class="row col-lg-8">
          <h2>Complete order</h2>
          <li><a href="<?=Url::to(['site/index'])?>"><button type="button" class="btn btn-primary">Continue Shopping</button></a></li>
      </div>
  </div>
</div>
