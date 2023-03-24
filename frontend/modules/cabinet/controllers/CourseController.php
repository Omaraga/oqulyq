<?php
namespace frontend\modules\cabinet\controllers;

use common\models\Course;
use common\models\Lesson;
use common\models\Module;
use common\models\UserCourse;
use frontend\modules\cabinet\components\BaseCabinetController as Controller;

class CourseController extends Controller
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
            'promo_courses' => $promo_courses
        ]);
    }
    public function actionBuy()
    {
        return $this->render('buy');
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionPayment()
    {
        return $this->render('payment');
    }

    public function actionWatch()
    {
        $course = Course::findOne(\Yii::$app->request->get('id'));
        $module = Module::find()->where(['course_id' => $course->id])->one();
        $lessons = Lesson::find()->where(['module_id' => $module->id])->andWhere(['course_id'=>$course->id])->all();
        return $this->render('watch', [
            'course' => $course,
            'module' => $module,
            'lessons' => $lessons
        ]);
    }

    public function actionWatchLessons($c, $l)
    {
        $course = Course::findOne($c);
        $module = Module::find()->where(['course_id' => $c])->one();
        $lessonOne = Lesson::findOne($l);
        $lessons = Lesson::find()->where(['module_id' => $module->id])->andWhere(['course_id'=>$course->id])->all();
        return $this->render('lessons', [
            'module' => $module,
            'lessons' => $lessons,
            'course' => $course,
            'lessonOne' => $lessonOne
        ]);
    }
}