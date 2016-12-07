<?php
use yii\helpers\Url;
use backend\models\PriceRange;
?>
<div class="row">
    <div class="col-md-3">
        <form action="<?=Url::to([''])?>" method="get">
            <div class="input-group">
                <input class="form-control" placeholder="Search" name="Title" type="text"
                       value="<?= isset($_GET['Title']) ? $_GET['Title'] : '' ?>">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>

            <div class="form-group" style="margin-top: 20px">
                <label for="sel1">Price filter</label>
                <div class="row">
                    <div class="col-md-8">
                      <?php
                        $price =  isset($_GET['Price']) ? $_GET['Price'] : '';
                        $range = PriceRange::find()->orderBy('to_price')->asArray()->all();
                      ?>
                        <select class="form-control" name="Price" id="sel1">
                          <option value="-1" <?= $price == '-1' ? "selected" : ""?>>All product</option>
                          <?php foreach ($range as $key => $value){?>
                            <option value="<?=$value['id']?>"  <?=$price == $value['id'] ? "selected" : ""?>><?=number_format($value['from_price']).'-'.number_format($value['to_price'])?></option>
                          <?php } ?>
                            <option value="-2"  <?=$price == -2 ? "selected" : ""?>>Above <?=number_format($value['to_price'])?></option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary" type="submit">Filter</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <div class="col-md-9">
        <div class="col-md-12">
        <?php
        if ($model != null) {
            if (sizeof($model) > 0 ) {
                foreach ($model as $item) {
                    ?>
                    <div class="col-sm-3 col-lg-3 col-md-3">
                        <div class="thumbnail" style="height: 500px;overflow: hidden">
                            <figure class="images" ><img  src="<?=$item['image']?>" alt=""></figure>
                            <div class="caption">
                                <h4 class="pull-right"><?= $item['our_price'] ?> Dong</h4>
                              <h4><a href="<?=Url::to(['/order/site/detail',"id"=>$item['id']])?>"><?=$item['title']?></a></h4>
                                <p>See more snippets like this online store item at</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right"><?=$item['viewed']?> veviewed</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php
                }
            } else {
                echo "<div class='container'><h4>Không tìm thấy kết quả nào hợp lệ</h4></div>";
            }
        }else {
          echo "<div class='container'><h4>Không tìm thấy kết quả nào hợp lệ</h4></div>";
        }
        ?>
    </div>
    <?php
    use yii\widgets\LinkPager;
      echo LinkPager::widget([
          'pagination' => $pages,
      ]);
    ?>
  </div>
</div>
