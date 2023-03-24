<?php

namespace frontend\controllers;

use common\models\Course;
use yii;
class CourseController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $courseList = Course::find()->all();
        return $this->render('index',[
            'courseList' => $courseList,
        ]);
    }

    public function actionView()
    {
        $course = Course::findOne(\Yii::$app->request->get('id'));
        $promo_courses = Course::find()->where(['status' => Course::STATUS_ACTIVE])->limit(2)->all();
        return $this->render('view',[
            'course' => $course,
            'promo_courses' => $promo_courses,
        ]);
    }

    public function actionBuy(){
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/auth/login');
        }else {
            $course = Course::findOne(\Yii::$app->request->get('id'));

            return $this->render('buy', [
                'course' => $course,
            ]);
        }
    }

}
