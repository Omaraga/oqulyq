<?php

namespace frontend\controllers;

use backend\controllers\PartnersController;
use common\models\City;
use common\models\Course;
use common\models\News;
use common\models\Partners;
use common\models\Region;
use common\models\School;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{

    /**
     * {@inheritdoc}
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
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest){
            return $this->redirect('/auth/login');
        }
        return $this->render('index', [
        ]);
    }
    /**
     * @return mixed
     * обрезает текст по количеству слов
     * $val = количество выводимых слов
     * $text = получаемый текст для обрезки
     */
    public static function getShortText($text, $val=null){
        if (!$val) {
            $val = 15;
        }
        $array = explode(" ", strip_tags($text));
        $array = array_slice($array, 0, $val);
        return implode(" ", $array) . '...';
    }
    /**
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Спасибо ваша заявка успешно отправлено.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }
            $model->sendTelegramNotification();

            return $this->redirect('/');
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionPartners(){
        $partners = Partners::find()->where(['status' => Partners::STATUS_PUBLISH])->andWhere(['type'=>Partners::STATUS_PARTNER])->all();
        $sponsors = Partners::find()->where(['status' => Partners::STATUS_PUBLISH])->andWhere(['type'=>Partners::STATUS_SPONSOR])->all();
        return $this->render('partners', [
                'partners' => $partners,
                'sponsors' => $sponsors,
            ]
        );
    }

}
