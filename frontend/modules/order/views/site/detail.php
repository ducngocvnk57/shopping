<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = $model->title;
?>

            <div class="col-md-9 col-md-offset-2" >
              <div class="products-details">
                <div class="preview_image">
                  <div class="preview-small">
                    <img id="zoom_03" src="<?=$model->image?>" data-zoom-image="images/products/Large/products-01.jpg" alt="">
                  </div>
                  <div class="thum-image">
                    <div class="caroufredsel_wrapper" style="display: block;text-align: start; float: none; position: relative; top: auto; right: auto; bottom: auto; left: auto; z-index: auto; width: 240px; height: 55px; margin: 0px; overflow: hidden;">
                      <ul id="gallery_01" class="prev-thum" style="text-align: left; padding:0px;float: none; position: absolute; top: 0px; right: auto; bottom: auto; left: 0px; margin: 0px; width: 840px; height: 55px;">
                      <?php foreach(json_decode(base64_decode($model->images)) as $key => $image) {
                        # code...
                      ?>
                      <li style="width: 60px;">
                        <a href="#" data-image="<?=$image?>" data-zoom-image="images/products/Large/products-01.jpg">
                          <img src="<?=$image?>" alt="">
                        </a>
                      </li>
                      <?php } ?>
                    </ul>
                  </div>
                    <a class="control-left" id="thum-prev" href="javascript:void(0);" style="display: block;">
                      <i class="fa fa-chevron-left">
                      </i>
                    </a>
                    <a class="control-right" id="thum-next" href="javascript:void(0);" style="display: block;">
                      <i class="fa fa-chevron-right">
                      </i>
                    </a>
                  </div>
                </div>
                <div class="products-description">
                  <h4 class="name">
                    <?=$model->title?>
                  </h4>
                  <h4>
                    Size : <?=$model->size_product?>
                  </h4>
                  <h4>
                    Color : <?=$model->color_product?>
                  </h4>
                  <p>
                    Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrie ces posuere cubilia curae. Proin lectus ipsum, gravida etds mattis vulps utate, tristique ut lectus. Sed et lorem nunc...
                  </p>
                  <hr class="border">
                  <div class="price">
                    Price :
                    <span class="new_price">
                      <?=number_format($model->getPrice());?>
                      <sup>
                        đ
                      </sup>
                    </span>
                    <span class="old_price">
                      450.00
                      <sup>
                        $
                      </sup>
                    </span>
                  </div>
                  <hr class="border">
                  <div class="wided">
                    <div class="qty">
                      <?php
                      $form = ActiveForm::begin([
                          'id' => 'login-form',
                          'options' => ['class' => 'form-inline'],
                          'action' => Url::to(['cart/add'])
                      ]) ?>
                        <input type="hidden" value="<?=$model->id?>" class="form-control" name="product_id">
                        <label for="email">Số lượng:</label>
                        <input type="number" value="1" class="form-control" name="quantily">
                    </div>
                    <div class="button_group">
                      <button class="button" >
                        Add To Cart
                      </button>
                    </div>
                    <?php ActiveForm::end() ?>
                  </div>
                </div>
              </div>
                <div class="tab-box">
                <div id="tabnav">
                  <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Description</a></li>
                    <li><a data-toggle="tab" href="#menu1">Review</a></li>
                  </ul>
                  <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                      <?= $model->description?>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                      <h3>Menu 1</h3>
                      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
