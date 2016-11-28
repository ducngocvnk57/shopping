<?php
?>
<div class="row">
    <div class="col-md-3">
        <form action="?r=search/site/index" method="post">
            <div class="input-group">
                <input class="form-control" placeholder="Search" name="searchKeyword" type="text"
                       value="<?= $query != "" ? $query : "" ?>">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>

            <div class="form-group" style="margin-top: 20px">
                <label for="sel1">Price filter</label>
                <div class="row">
                    <div class="col-md-8">
                        <select class="form-control" name="filter" id="sel1">
                            <option value="-1" <?=$defaultFilterValue == '-1' ? "selected" : ""?>>All product</option>
                            <option value="0" <?=$defaultFilterValue == '0' ? "selected" : ""?>>0 - 100,000</option>
                            <option value="1" <?=$defaultFilterValue == '1' ? "selected" : ""?>>100,000 - 200,000</option>
                            <option value="2" <?=$defaultFilterValue == '2' ? "selected" : ""?>>200,000 - 300,000</option>
                            <option value="3" <?=$defaultFilterValue == '3' ? "selected" : ""?>>300,000 - 400,000</option>
                            <option value="4" <?=$defaultFilterValue == '4' ? "selected" : ""?>>Above 400,000</option>
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
                                <h4><a href="?r=order/site/detail&id=<?=$item['id']?>"><?=$item['title']?></a>
                                </h4>
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
        }
        ?>
    </div>
</div>