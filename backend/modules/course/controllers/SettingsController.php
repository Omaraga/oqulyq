<?php

namespace backend\modules\course\controllers;

use backend\components\BaseAdminController as Controller;
use common\models\Course;
use common\models\Lesson;
use common\models\Module;
use common\models\UserCourse;
use richardfan\sortable\SortableAction;
use yii\data\ActiveDataProvider;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;
use Yii;
/**
 * Default controller for the `course` module
 */
class SettingsController extends Controller
{

    public function actions()
    {
        return [
            'sortItem' => [
                'class' => SortableAction::className(),
                'activeRecordClassName' => Module::className(),
                'orderColumn' => 'sort',
            ],
            // your other actions
        ];
    }

    /**
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionIndex()
    {
        $course = Yii::$app->request->get('id') ? Course::findOne((int) Yii::$app->request->get('id')) : null;
        if (!$course){
            throw new NotFoundHttpException(Yii::t('app', 'Страница не найдена.'));
        }
        $menu = Yii::$app->request->get('menu')? : 'structure';

        $dataProvider = new ActiveDataProvider([
            'query' => Module::find()->where(['course_id' => $course->id]),
            'pagination' => false,
            'sort' => [
                'defaultOrder' => [
                    'sort' => SORT_ASC,
                ]
            ],
        ]);
        $students = new ActiveDataProvider([
            'query' => UserCourse::find()->where(['course_id' => $course->id]),
            'pagination' => [
                'pageSize' => 20
            ],
        ]);

        return $this->render('index', [
            'course' => $course,
            'dataProvider' => $dataProvider,
            'menu' => $menu,
            'students' => $students
        ]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionCreateModule()
    {
        $model = new Module();
        if (Yii::$app->request->isAjax && Yii::$app->request->isPost){
            $model->course_id = Yii::$app->request->post('course');
            $model->title = Yii::$app->request->post('title');
            if ($model->save()){
                return Json::encode(['success' => 1]);
            }
        }
    }

    /**
     * @return string|void
     */
    public function actionCreateLesson()
    {
        $model = new Lesson();
        if (Yii::$app->request->isAjax && Yii::$app->request->isPost){
            $model->course_id = Yii::$app->request->post('course');
            $model->module_id = Yii::$app->request->post('module');
            $model->title = Yii::$app->request->post('title');
            if ($model->save()){
                return Json::encode(['success' => 1]);
            }
        }
    }

    /**
     * @param int $id ID
     * @return Course the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Course::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
