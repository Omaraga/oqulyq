<?php

namespace frontend\controllers;
use frontend\models\PasswordResetRequestForm;
use Yii;

class UserController extends \yii\web\Controller
{
    public function actionIndex()
    {

        return $this->render('index');
    }


}
