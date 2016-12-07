<?php
namespace frontend\modules\search\controllers;

use frontend\modules\search\models\Product;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;
use frontend\modules\search\models\SearchForm;
/**
 * Site controller
 */
class SiteController extends Controller
{
    public $enableCsrfValidation = false;

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $params = $_GET;
        $product = Product::find();
        foreach ($_GET as $key => $value) {
            $searchClass = 'frontend\modules\search\controllers\Search'.$key;
            if(class_exists($searchClass))
              $product = $searchClass::search($value,$product);
        }
        $query = $product->orderBy('our_price');
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count]);
        $model =   $query->offset($pagination->offset)->limit($pagination->limit)->asArray()->all();
        return $this->render('index', [
            'model' => $model,
            'pages' => $pagination
        ]);
    }
}
