<?php

namespace backend\modules\course\controllers;

use common\models\Lesson;
use common\models\Module;
use richardfan\sortable\SortableAction;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use backend\components\BaseAdminController as Controller;

class ModuleController extends Controller
{
    public function actions()
    {
        return [
            'sortItem' => [
                'class' => SortableAction::className(),
                'activeRecordClassName' => Lesson::className(),
                'orderColumn' => 'sort',
            ],
        ];
    }
    public function actionIndex()
    {
        $module = Yii::$app->request->get('id') ? Module::findOne((int)Yii::$app->request->get('id')): null;
        $dataProvider = new ActiveDataProvider([
            'query' => Lesson::find()->where(['module_id' => $module->id]),
            'pagination' => false,
            'sort' => [
                'defaultOrder' => [
                    'sort' => SORT_ASC,
                ]
            ],
        ]);
        return $this->render('index',[
            'module' => $module,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['/course/module', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * @throws NotFoundHttpException
     * @throws \yii\db\Exception
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->is_deleted = 1;
        $course = $model->course;
        $transaction = \Yii::$app->db->beginTransaction();
        $lessons = $model->lessons;
        if ($lessons){
            foreach ($lessons as $lesson){
                $lesson->is_deleted = 1;
                if (!$lesson->save()){
                    $transaction->rollBack();
                    Yii::$app->session->setFlash('error', 'Ошибка при удалении');
                    return $this->redirect(['/course/module', 'id' => $model->id]);
                }
            }
        }
        if (!$model->save()){
            $transaction->rollBack();
            Yii::$app->session->setFlash('error', 'Ошибка при удалении');
            return $this->redirect(['/course/module', 'id' => $model->id]);
        }
        $transaction->commit();
        Yii::$app->session->setFlash('success', 'Модуль удален');
        return $this->redirect(['/course/settings', 'id' => $course->id]);
    }

    /**
     * @param $id
     * @return Module|null
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = Module::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}
