<?php
namespace frontend\modules\order\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use frontend\modules\order\models\Product;
use frontend\modules\order\models\ProductCategory;
/**
 * Site controller
 */
class SiteController extends Controller
{
  /**
   * @inheritdoc
   */

  /**
   * @inheritdoc
   */
  public function actions()
  {
    return [
        'error' => [
            'class' => 'yii\web\ErrorAction',
        ],
    ];
  }


  /**
   * Displays homepage.
   *
   * @return mixed
   */
  public function actionIndex()
  {
  /**
   * Get product and pagging
   */
    $request = Yii::$app->request;
    $query = Product::find();
    if(($parentid = $request->get('categoryid'))!=null){
      $query =  $query->where(['parentid' => $parentid]);
    }
    $pages = new Pagination(['totalCount' => $query->count()]);
    $models = $query->offset($pages->offset)
        ->limit($pages->limit)
        ->all();
    /**
     * get product category
     */
    $categorys = ProductCategory::find()->where(['level'=>3])->all();

    return $this->render('index', [
        'models' => $models,
        'pages' => $pages,
        'categorys' => $categorys
    ]);
  }
  public function actionDetail($id)
  {
    $model = Product::findOne($id);
    //$images = json_decode(base64_decode($model['images']));
    return $this->render('detail',[
       'model' => $model
    ]);
  }

}
