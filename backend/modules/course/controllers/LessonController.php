<?php

namespace backend\modules\course\controllers;

use common\models\Lesson;
use common\models\Module;
use richardfan\sortable\SortableAction;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use backend\components\BaseAdminController as Controller;

class LessonController extends Controller
{
    /**
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionIndex()
    {
        $model = Yii::$app->request->get('id') ? $this->findModel((int)Yii::$app->request->get('id')): null;
        return $this->render('index',[
            'model' => $model,
        ]);
    }

    /**
     * @throws NotFoundHttpException
     */
    public function actionCreate()
    {
        $model = new Lesson();
        $module = Yii::$app->request->get('module_id') ? Module::findOne((int)Yii::$app->request->get('module_id')) : null;
        $model->module_id = $module->id;
        $model->course_id = $module->course_id;
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Урок успешно создан');
            return $this->redirect(['/course/module', 'id' => $module->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'module' => $module,
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
        $transaction = \Yii::$app->db->beginTransaction();
        if (!$model->save()){
            $transaction->rollBack();
            Yii::$app->session->setFlash('error', 'Ошибка при удалении');
        }else{
            $transaction->commit();
            Yii::$app->session->setFlash('success', 'Урок удален');
        }
        return $this->redirect(['/course/module', 'id' => $model->module_id]);
    }

    /**
     * @param $id
     * @return Lesson|null
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = Lesson::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}
