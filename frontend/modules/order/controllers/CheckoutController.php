<?php
namespace frontend\modules\order\controllers;

use yii\web\Controller;
use Yii;
use frontend\modules\order\services\CartService;
use frontend\modules\order\models\Product;
use frontend\modules\order\models\CustomInfoForm;
use frontend\modules\order\models\Order;
use frontend\models\MemberLoginForm;
/**
 *
 */
class CheckoutController extends Controller
{

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
    if($cart->isEmpty()){
      return $this->redirect(['site/index']);
    }
    if(Yii::$app->user->isGuest){
      $session = Yii::$app->session;
      if($session->has('noMember')){
        return $this->redirect(['checkout/confirm']);
      }
      $model = new MemberLoginForm();
      if ($model->load(Yii::$app->request->post()) && $model->login()) {
        return $this->redirect('confirm');
      } else {
        return $this->render("index",['model'=> $model]);
      }
    }
    return $this->redirect(['checkout/confirm']);
  }


  public function actionNoMember(){
    $model = new CustomInfoForm();
    if ($model->load(Yii::$app->request->post())) {
      if ($user = $model->signup()) {
        $session = Yii::$app->session;
        $session->set('noMember',$user);
        return $this->redirect('confirm');
      }
    }
    return $this->render("nomember",['model'=> $model]);
  }


  public function actionConfirm(){
    $user = $this->getCustomerInfo();
    return $this->render("confirm",['user' => $user]);
  }


  public function actionComplete(){
    $cart = new CartService();
    if($cart->isEmpty()){
      return $this->redirect(['site/index']);
    }
    $user = $this->getCustomerInfo();
    if(Order::saveOrder($cart,$user)){
      try{
        \Yii::$app->mail->compose('order',['cart'=>$cart,'user'=>$user])
        ->setFrom([\Yii::$app->params['adminEmail']=>'ducngocvnk57'])
        ->setTo($user->email)
        ->setSubject('order info')
        ->send();
      }catch(\Swift_TransportException $e) {
        echo 'Message: ' .$e->getMessage();
      }
      $cart->clear();
      return $this->render("complete");
    }
  }

  protected function getCustomerInfo(){
    if(!Yii::$app->user->isGuest){
      $user = Yii::$app->user->identity;
      return $user;
    }else{
      $session = Yii::$app->session;
      $user = $session->get('noMember');
      return $user;
    }
    return null;
  }

  public function actionTest(){
    Order::getOrder();
  }
}
?>
