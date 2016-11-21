<?php
  use yii\helpers\Url;
 ?>
<div class="site-login">
  <div class="row" style="width:80%">
      <div class="row col-lg-8">
        <div class="form-login col-lg-6 offset-lg-3">
          <?=Yii::$app->view->render('@app/views/site/_login.php',['model'=> $model]);?>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="no-member">
          <h3> No register </h3>
          <a href="<?=Url::to(['checkout/no-member'])?>"> No member</a>
        </div>
      </div>
  </div>
</div>
