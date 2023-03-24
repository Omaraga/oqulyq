<?php

namespace backend\modules\course\controllers;

use backend\components\BaseAdminController as Controller;
use common\models\Course;
use richardfan\sortable\SortableAction;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use Yii;

/**
 * Default controller for the `course` module
 */
class DefaultController extends Controller
{

    /**
     * @return array|\string[][]
     */
    public function actions()
    {
        return array_merge(parent::actions(), [
            'sortItem' => [
                'class' => SortableAction::className(),
                'activeRecordClassName' => Course::className(),
                'orderColumn' => 'sort',
            ],
        ]);
    }

    /**
     * Renders the index view for the module
     * @return string
     */


    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Course::find(),
            'pagination' => false,
            'sort' => [
                'defaultOrder' => [
                    'sort' => SORT_ASC,
                ]
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Course();

        if ($this->request->isPost) {

            if ($model->load($this->request->post()) ) {

                if ($model->save()){
                    return $this->redirect(['view', 'id' => $model->id]);
                }else{
                    echo "MODEL NOT SAVED";
                    print_r($model->getAttributes());
                    print_r($model->getErrors());
                    exit;
                }

            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Course model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    /**
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(\Yii::$app->request->referrer);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->is_deleted = 1;
        $model->save(false);
        return $this->redirect(['index']);
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
