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
        if (isset($_POST['searchKeyword'])) {
            $text = $_POST['searchKeyword'];
        } else {
            $text = "";
        }
        $query = Product::find()->where(['like', 'title', $text]);
        $page = new Pagination(['defaultPageSize' => 8, 'totalCount' => $query->count()]);
        $model = $query->offset($page->offset)
            ->limit($page->limit)
            ->all();

        return $this->render('index', [
            'model' => $model,
            'page' => $page
        ]);
    }
}
