<?php
namespace frontend\modules\user\models;
use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $name;
    public $phone;
    public $address;
    public $company;
    public $password;
    public $password_repeat;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => 'frontend\modules\user\models\Member', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => 'frontend\modules\user\models\Member', 'message' => 'This email address has already been taken.'],

            ['name', 'trim'],
            ['name', 'required'],
            ['name', 'string', 'min' => 2, 'max' => 255],

            ['address', 'required'],
            ['company', 'required'],
            ['phone', 'required'],
            ['phone',function ($attribute, $params) {
                if (!preg_match('/^[0-9]{10,11}$/', $this->$attribute)) {
                  $this->addError($attribute, 'Phone number');
                }
              }],

            ['password', 'required'],
            ['password', 'compare'],
            ['password', 'string', 'min' => 6],

            ['password_repeat', 'required'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
        ];
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
        $user->username = $this->username;
        $user->email = $this->email;
        $user->name = $this->name;
        $user->address = $this->address;
        $user->phone = $this->phone;
        $user->company = $this->company;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        return $user->save() ? $user : null;
    }
}
