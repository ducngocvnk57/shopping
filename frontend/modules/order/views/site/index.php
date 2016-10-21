<div class="row">
  <div class="col-md-3">
    <p class="lead">Shop Name</p>
    <div class="list-group">
      <a href="#" class="list-group-item">Category 1</a>
      <a href="#" class="list-group-item">Category 2</a>
      <a href="#" class="list-group-item">Category 3</a>
    </div>
  </div>
  <div class="col-md-9">
<!--    <div class="row carousel-holder">-->
<!---->
<!--      <div class="col-md-12">-->
<!--        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">-->
<!--          <ol class="carousel-indicators">-->
<!--            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>-->
<!--            <li data-target="#carousel-example-generic" data-slide-to="1"></li>-->
<!--            <li data-target="#carousel-example-generic" data-slide-to="2"></li>-->
<!--          </ol>-->
<!--          <div class="carousel-inner">-->
<!--            <div class="item active">-->
<!--              <img class="slide-image" src="http://placehold.it/800x300" alt="">-->
<!--            </div>-->
<!--            <div class="item">-->
<!--              <img class="slide-image" src="http://placehold.it/800x300" alt="">-->
<!--            </div>-->
<!--            <div class="item">-->
<!--              <img class="slide-image" src="http://placehold.it/800x300" alt="">-->
<!--            </div>-->
<!--          </div>-->
<!--          <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">-->
<!--            <span class="glyphicon glyphicon-chevron-left"></span>-->
<!--          </a>-->
<!--          <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">-->
<!--            <span class="glyphicon glyphicon-chevron-right"></span>-->
<!--          </a>-->
<!--        </div>-->
<!--      </div>-->
<!---->
<!--    </div>-->
    <div class="row">
      <?php
      foreach ($models as $model) {
      ?>
      <div class="col-sm-3 col-lg-3 col-md-3">
        <div class="thumbnail" style="height: 500px;overflow: hidden">
          <figure class="images" style="height: 300px;overflow: hidden;width: 100%;"><img style="width: 100%;height: auto;" src="<?=$model->image;?>" alt=""></figure>
          <div class="caption">
            <h4 class="pull-right"><?=$model->our_price?>Dong</h4>
            <h4><a href="?r=order/site/detail&id=<?=$model->id?>"><?=$model->title?></a>
            </h4>
            <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
          </div>
          <div class="ratings">
            <p class="pull-right"><?=$model->viewed?> veviewed</p>
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
      <?php } ?>
    </div>
  <?php
  use yii\widgets\LinkPager;
  echo LinkPager::widget([
      'pagination' => $pages,
  ]);
  ?>
  </div>
</div>