<?php
use yii\widgets\DetailView;
use yii\helpers\Url;
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'title',                                           // title attribute (in plain text)
        'description:html'
    ],

]);
?>
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-inline'],
    'action' => Url::to(['cart/add'])
]) ?>
  <input type="hidden" value="<?=$model->id?>" class="form-control" name="product_id">
  <label for="email">Số lượng:</label>
  <input type="number" value="1" class="form-control" name="quantily">
  <div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
      <?= Html::submitButton('Add', ['class' => 'btn btn-primary']) ?>
    </div>
  </div>
<?php ActiveForm::end() ?>
