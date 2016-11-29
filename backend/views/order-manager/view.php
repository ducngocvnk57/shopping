<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model frontend\modules\order\models\Order */

$this->title = $model->phone;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
?>
<div class="order-view">
    <table bgcolor="#fff" width="100%" border="0" cellspacing="0" cellpadding="0">
       <tbody>
         <tr>
           <p style="font-weight: bold;"> Customer Info :</p><br>
           Name : <?= $model->fullname?><br>
           Email : <?= $model->email?><br>
           Address : <?=$model->address?><br>
           Phone Number : <?=$model->phone?><br>
           <br>
           <br>
        <tr>
          <tr>
             <td>
               <table style="width:50%" border="0" cellspacing="0" cellpadding="0">
                  <tbody>
                    <tr>
                       <th>ID</th>
                       <th>Name</th>
                       <th>Image</th>
                       <th>Price</th>
                       <th>Quantily</th>
                       <th>Unit Price</th>
                     </tr>
                    <?php
                      $items = unserialize($model->data);
                      foreach ($items as $item) {
                        $product = $item->getProduct();
                    ?>
                    <tr>
                     <td align="center"><?=$product->id?></td>
                     <td align="center"><?=$product->getTitle()?></td>
                     <td align="center"><img width="92" src="<?=$product->image?>" style="display:block;margin-top:20px"></td>
                     <td align="center"><?=number_format($product->getPrice())?> VNĐ</td>
                     <td align="center"><?=$item->getQuanlity()?></td>
                     <td align="center"><?=number_format($item->getUnitPrice())?> VNĐ</td>
                    </tr>
                    <?php } ?>
                    </tbody>
                  </table>
             </td>
          </tr>
       </tbody>
    </table>
</div>
