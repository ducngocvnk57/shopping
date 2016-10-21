<?php
namespace frontend\modules\order\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\User;
/**
 * Site controller
 */
class SiteController extends Controller
{
  /**
   * @inheritdoc
   */
  public function behaviors()
  {
    return [
        'access' => [
            'class' => AccessControl::className(),
            'rules' => [
                [
                    'actions' => ['login', 'error'],
                    'allow' => true,
                ],
                [
                    'actions' => ['logout', 'index','set-session'],
                    'allow' => true,
                    'roles' => ['@'],
                ],
            ],
        ],
        'verbs' => [
            'class' => VerbFilter::className(),
            'actions' => [
                'logout' => ['post'],
            ],
        ],
    ];
  }

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
   * @return string
   */
  public function actionIndex()
  {
    $user = Yii::$app->session->get("user");
    return $this->render('index');
  }
  public function actionSetSession()
  {
    $temp = User::find()->all();
    Yii::$app->session->set("user",$temp);
    die();
  }
  /**
   * Login action.
   *
   * @return string
   */
  public function actionLogin()
  {
    if (!Yii::$app->user->isGuest) {
      return $this->goHome();
    }

    $model = new LoginForm();
    if ($model->load(Yii::$app->request->post()) && $model->login()) {
      return $this->goBack();
    } else {
      return $this->render('login', [
          'model' => $model,
      ]);
    }
  }

  /**
   * Logout action.
   *
   * @return string
   */
  public function actionLogout()
  {
    Yii::$app->user->logout();

    return $this->goHome();
  }
}
