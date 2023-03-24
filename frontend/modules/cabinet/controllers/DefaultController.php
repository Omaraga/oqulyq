<?php

namespace frontend\modules\cabinet\controllers;

use common\models\Course;
use frontend\modules\cabinet\components\BaseCabinetController as Controller;
use Yii;
/**
 * Default controller for the `cabinet` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

        if (Yii::$app->user->isGuest) {
            return $this->redirect('/');
        }
        $courses = Course::find()->all();
        return $this->render('index', [
            'courses' => $courses
        ]);
    }

    public function actionAbout()
    {
        if (Yii::$app->user->isGuest)
        {
            return $this->redirect('/');
        }
        return $this->render('about');
    }
}
