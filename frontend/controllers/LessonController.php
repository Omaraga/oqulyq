<?php

namespace frontend\controllers;

use backend\controllers\PartnersController;
use common\models\Book;
use common\models\City;
use common\models\Course;
use common\models\Dictionary;
use common\models\Lesson;
use common\models\News;
use common\models\Partners;
use common\models\Region;
use common\models\School;
use common\models\Test;
use common\models\Video;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\BaseObject;
use yii\base\InvalidArgumentException;
use yii\data\ActiveDataProvider;
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
class LessonController extends Controller
{


    /**
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest){
            return $this->redirect('/auth/login');
        }
        $id = Yii::$app->request->get('id');
        $lesson = Lesson::findOne($id);
        $dataProvider = new ActiveDataProvider([
            'query' => Dictionary::find()->where(['lesson_id' => $id])->orderBy('ru'),
        ]);
        return $this->render('index', [
            'lesson' => $lesson,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @return mixed
     */
    public function actionGramma()
    {
        if (Yii::$app->user->isGuest){
            return $this->redirect('/auth/login');
        }
        $id = Yii::$app->request->get('id');
        $lesson = Lesson::findOne($id);
        $dataProvider = new ActiveDataProvider([
            'query' => Dictionary::find()->where(['lesson_id' => $id])->orderBy('ru'),
        ]);
        return $this->render('gramma', [
            'lesson' => $lesson,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @return mixed
     */
    public function actionTask()
    {
        if (Yii::$app->user->isGuest){
            return $this->redirect('/auth/login');
        }
        $id = Yii::$app->request->get('id');
        $task = Yii::$app->request->get('task');
        $lesson = Lesson::findOne($id);
        $tests = Test::find()->where(['lesson_id' => $id])->orderBy('id')->all();
        $currentTest = $task ? Test::findOne($task) : Test::find()->where(['lesson_id' => $id])->orderBy('id')->one();
        $prevTest = null;
        $nextTest = null;
        for($i = 0; $i < sizeof($tests); $i++){
            if ($tests[$i]->id == $currentTest->id){
                if ($i > 0){
                    $prevTest = $tests[$i-1];
                }
                if ($i + 1 < sizeof($tests)){
                    $nextTest = $tests[$i+1];
                }
            }
        }

        return $this->render('task', [
            'lesson' => $lesson,
            'currentTest' => $currentTest,
            'prevTest' => $prevTest,
            'nextTest' => $nextTest,
        ]);
    }

}
