<?php
use yii\widgets\DetailView;
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'title',                                           // title attribute (in plain text)
        'description:html'
    ],

]);
?>