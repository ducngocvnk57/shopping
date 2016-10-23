<?php
/**
 * Created by PhpStorm.
 * User: ducngoc
 * Date: 22/10/2016
 * Time: 15:43
 */

namespace frontend\modules\order\controllers;

use yii\web\Controller;
use Yii;
use frontend\modules\order\services\CartService;
use frontend\modules\order\models\Product;

class CartController extends Controller
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
  public function actionIndex(){
    $cart = new CartService();
    return $this->render('index.php',[
        'cart' => $cart,
    ]);
  }
  public function actionAdd(){
    $request = Yii::$app->request;
    $product_id = $request->post("product_id");
    $quantily = $request->post("quantily");
    $productClass = Product::findOne($product_id);
    if(isset($product_id)&&isset($quantily)&&$productClass) {
      $cartService = new CartService();
      $cartService->addProduct($productClass, $quantily)->save();
    }
    $this->redirect('?r=order/cart/index');
  }
  public function actionUp(){
    $request = Yii::$app->request;
    $product_id = $request->get("product_id");
    if(isset($product_id)){
      $cartService = new CartService();
      $cartService->upProductQuantity($product_id)->save();
    }
    $this->redirect('?r=order/cart/index');
  }
  public function actionDown(){
    $request = Yii::$app->request;
    $product_id = $request->get("product_id");
    if(isset($product_id)){
      $cartService = new CartService();
      $cartService->downProductQuantity($product_id)->save();
    }
    $this->redirect('?r=order/cart/index');
  }
  public function actionRemove(){
    $request = Yii::$app->request;
    $product_id = $request->get("product_id");
    if(isset($product_id)){
      $cartService = new CartService();
      $cartService->removeProduct($product_id)->save();
    }
    $this->redirect('?r=order/cart/index');
  }
  public function actionSetQuantity(){
    $this->redirect('?r=order/cart/index');
  }
}