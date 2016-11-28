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
        if (isset($_POST['filter'])) {
            switch ($_POST['filter'][0]) {
                case '0':
                    $fromPrice = 0;
                    $toPrice = 100000;
                    $defaultFilterValue = '0';
                    break;
                case '1':
                    $fromPrice = 100000;
                    $toPrice = 200000;
                    $defaultFilterValue = '1';
                    break;
                case '2':
                    $fromPrice = 200000;
                    $toPrice = 300000;
                    $defaultFilterValue = '2';
                    break;
                case '3':
                    $fromPrice = 300000;
                    $toPrice = 400000;
                    $defaultFilterValue = '3';
                    break;
                case '4':
                    $fromPrice = 40000;
                    $toPrice = 1000000000;
                    $defaultFilterValue = '4';
                    break;
                default:
                    $fromPrice = 0;
                    $toPrice = 1000000000;
                    $defaultFilterValue = '-1';
                    break;
            }
        } else {
            $fromPrice = 0;
            $toPrice = 1000000000;
            $defaultFilterValue = '-1';
        }
        $query = Product::find()->where(['like', 'title', $text])->andWhere(['between', 'our_price', $fromPrice, $toPrice]);
        $model = $query->orderBy('our_price')
            ->asArray()
            ->all();

        return $this->render('index', [
            'model' => $model,
            'query' => $text,
            'defaultFilterValue' => $defaultFilterValue
        ]);
    }
}
