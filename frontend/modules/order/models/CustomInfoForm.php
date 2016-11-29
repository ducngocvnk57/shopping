<?php
namespace frontend\modules\order\models;

use yii\base\Model;
use Yii;
/**
 * Signup form
 */
class CustomInfoForm extends Model
{
    public $name;
    public $email;
    public $phone;
    public $address;
    public $company;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['name', 'trim'],
            ['name', 'required'],
            ['name', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['address', 'required'],
            ['company', 'required'],
            ['phone', 'required'],
            ['phone',function ($attribute, $params) {
                if (!preg_match('/^[0-9]{10,11}$/', $this->$attribute)) {
                  $this->addError($attribute, 'Phone number');
                }
              }],

        ];
    }
    public function init()
    {
      $session = Yii::$app->session;
      $user = $session->get('noMember');
      $this->name = $user->name;
      $this->phone = $user->phone;
      $this->email = $user->email;
      $this->address = $user->address;
      $this->company = $user->address;
      parent::init();
    }
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        $user = new Member();
        $user->name = $this->name;
        $user->phone = $this->phone;
        $user->email = $this->email;
        $user->address = $this->address;
        $user->company = $this->company;
        return $user;
    }
}
