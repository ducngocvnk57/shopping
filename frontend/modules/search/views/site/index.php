<?php
use yii\helpers\Url;
?>
<div class="row">
    <div class="col-md-3">
        <form action="<?=Url::to([''])?>" method="post">
            <div class="input-group">
                <input class="form-control" placeholder="Search" name="searchKeyword" type="text">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-9">
        <?php
        if ($model != null) {
            if (sizeof($model) > 0 ) {
                foreach ($model as $item) {
                    ?>
                    <div class="col-sm-3 col-lg-3 col-md-3">
                        <div class="thumbnail" style="height: 500px;overflow: hidden">
                            <figure class="images" ><img  src="<?=$item->image;?>" alt=""></figure>
                            <div class="caption">
                                <h4 class="pull-right">Dong</h4>
                                <h4><a href="<?=Url::to(['/order/site/detail',"id"=>$item->id])?>"><?=$item->title?></a>
                                </h4>
                                <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right"><?=$item->viewed?> veviewed</p>
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
        }
        ?>
    </div>
</div>
