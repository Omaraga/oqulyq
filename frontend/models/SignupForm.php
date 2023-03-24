<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $first_name;
    public $last_name;
    public $middle_name;
    public $phone;
    public $country_id;
    public $city;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'middle_name', 'last_name','phone', 'email'], 'trim'],
            [['first_name', 'middle_name', 'last_name','phone', 'email', 'password'], 'string', 'max' => 255],
            [['last_name', 'first_name','phone', 'email'], 'required'],
//            [['middle_name'], 'safe'],
            [['country_id'], 'integer'],
            ['phone', 'unique', 'targetClass' => '\common\models\User', 'message' => Yii::t('main', "Телефон уже зарегистрирован")],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => Yii::t('main', "Email уже используется")],
            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'first_name' => Yii::t('users','Имя'),
            'last_name' => Yii::t('users','Фамилия'),
            'middle_name' => Yii::t('users','Отчество'),
            'username' => Yii::t('users','Логин'),
            'password' => Yii::t('users','Пароль'),
            'email' => Yii::t('users','E-mail'),
            'phone' => Yii::t('users','Телефон'),
            'city'=> Yii::t('city', 'Город'),
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->email;
        $user->first_name = $this->first_name;
        $user->middle_name = $this->middle_name;
        $user->last_name = $this->last_name;
        $user->phone = $this->phone;
        $user->email = $this->email;
//        $user->city = $this->city;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
//        $user->generatePhoneVerificationToken();
//        $this->sendSms();

        return $user->save();

    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }

    /**
     * Sends confirmation sms to user
     * @param User $user user model to with sms should be send
     * @return bool wherher the sms was sent
     */
//    protected function sendSms($user)
//    {
//
//    }
}
