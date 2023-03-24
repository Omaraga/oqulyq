<?php
namespace frontend\modules\cabinet\controllers;

use common\models\User;
use Yii;
use frontend\modules\cabinet\components\BaseCabinetController as Controller;

class ProfileController extends Controller
{

    public function actionIndex(){

        if (Yii::$app->user->isGuest) {
            return $this->redirect('/');
        }
        $model = User::findOne(Yii::$app->user->identity['id']);
        $courses = $model->getCourse();
        return $this->render('index', [
            'model' => $model,
            'courses' => $courses,
        ]);
    }
    public function actionCertificate(){

        return $this->render('certificate');
    }

}