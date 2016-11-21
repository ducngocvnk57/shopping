<?php
use yii\helpers\Url;
?>
<table bgcolor="#f3f3f3" border="0" cellspacing="0" cellpadding="0" style="max-width:600px">
   <tbody>
      <tr>
         <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width:332px;max-width:600px;border-bottom:0;border-top-left-radius:3px;border-top-right-radius:3px;border-bottom: 3px solid #4da157;">
               <tbody>
                  <tr>
                    <td align="center"><img width="92" height="32" src="http://www.freeiconspng.com/uploads/retail-store-icon-8.jpg" style="display:block;width:92px;height:32px;margin-top:20px" class="CToWUd"></td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
      <tr>
         <td style="padding:0px 30px">
            <table bgcolor="#fff" width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width:332px;max-width:550;border:1px solid #f0f0f0;border-bottom:1px solid #c0c0c0;border-top:0;border-bottom-left-radius:3px;border-bottom-right-radius:3px;margin-top:40px;padding:20px">
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
                     <td>
                        <table style="min-width:300px" border="0" cellspacing="0" cellpadding="0">
                           <tbody>
                             <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Quantily</th>
                                <th>Unit Price</th>
                              </tr>
                             <?php foreach ($cart->getCartItems() as $item) {
                                 $product = $item->getProduct();
                               ?>
                             <tr>
                              <td align="center"><?=$product->id?></td>
                              <td align="center"><?=$product->getTitle()?></td>
                              <td align="center"><img width="92" height="32" src="<?=$product->image?>" style="display:block;width:92px;height:32px;margin-top:20px" class="CToWUd"></td>
                              <td align="center"><?=number_format($product->getPrice())?> VNĐ</td>
                              <td align="center"><?=$item->getQuanlity()?></td>
                              <td align="center"><?=number_format($item->getUnitPrice())?> VNĐ</td>
                             </tr>
                             <?php } ?>
                             <tr>
                               <td></td>
                               <td></td>
                               <td></td>
                               <td></td>
                               <td>Total : <?=number_format($cart->totalPrice())?> VNĐ</td>
                              </tr>
                             </tbody>
                           </table>
                     </td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
      <tr>
         <td align="center" style="padding: 0px 40px">
            <table style="line-height:18px;padding-bottom:10px;margin-top:20px;font-size:10px">
               <tbody>
                  <tr>
                     <td align="center" style="padding-bottom: 15px;"><span>サポートのご希望や、このメールに心当たりがない場合は、弊社サポートチームまでお問い合わせください</span></td>
                  </tr>
                  <tr>
                     <td align="center"><h2 style="margin-bottom:0px">03-4231-9211</h2></td>
                  </tr>
                  <tr>
                     <td align="center" style="padding-bottom: 15px;"><span style="margin-bottom:20px">繋がりにくい場合は 03-6451-1350まで</span></td>
                  </tr>
                  <tr>
                     <td align="center"><span>Produced by</span></td>
                  </tr>
                  <tr>
                     <td align="center"><h4>MOSQUITONE,INC. | 株式会社モスキートーン</h4></td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
   </tbody>
</table>
