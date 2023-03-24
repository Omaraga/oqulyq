<?php
namespace frontend\modules\cabinet\controllers;

use common\models\UserKid;
use frontend\modules\cabinet\components\BaseCabinetController as Controller;
use common\models\Kid;
use common\models\User;
use Yii;
use yii\web\NotFoundHttpException;

class KidController extends Controller
{

    public function actionIndex(){
        $model = User::findOne(Yii::$app->user->identity['id'])->kids;
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionCreate(){
        $model = new Kid();
        $user_id = Yii::$app->user->identity['id'];
        if (Yii::$app->request->isPost) {
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                $model->parent_id = $user_id;
                if ($model->save()){
                    $relation = new UserKid();
                    $relation->kid_id = $model->id;
                    $relation->user_id = $user_id;
                    $relation->save();
                    Yii::$app->session->setFlash('success', 'Ребенок успешно добавлен');
                }else{
                    Yii::$app->session->setFlash('error', 'Ошибка прим сохранении');
                }
                return $this->redirect('/cabinet/kid');
            }else{
                Yii::$app->session->setFlash('error', 'Ошибка при заполнении формы');
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id){
        $model = Kid::findOne($id);
        if (Yii::$app->request->isPost) {
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                if ($model->save()){
                    Yii::$app->session->setFlash('success', 'Данные ребенка успешно изменены');
                }else{
                    Yii::$app->session->setFlash('error', 'Ошибка прим сохранении');
                }
                return $this->redirect('index');
            }
        }
        $model->loadDefaultValues(false);
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id) {
        $kid = $this->findModel($id);
        $kid->is_deleted = 1;
        $kid->save();
        return $this->redirect(['/profile/setting']);
    }
    protected function findModel($id) {
        if (($model = Kid::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'Запрашиваемая страница не существует.'));
    }
}