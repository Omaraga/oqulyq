<?php

namespace frontend\controllers;

use common\models\Kid;
use common\models\User;
use common\models\UserKid;
use Yii;
use yii\web\NotFoundHttpException;

class ProfileController extends \yii\web\Controller
{
    public function actionIndex()
    {

        if (Yii::$app->user->isGuest) {
            return $this->redirect('/');
        }
        return $this->redirect('/cabinet');

        return $this->render('index');
    }
    public function actionSetting()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/');
        }

        $model = User::findOne(Yii::$app->user->identity['id']);
        $kids = $model->kids;
        return $this->render('setting', [
            'model' => $model,
            'kids' => $kids,
        ]);
    }

    public function actionUpdateUser(){
        $user_id = Yii::$app->user->identity['id'];
        $model = User::findOne(['id'=>$user_id]);

        if (Yii::$app->request->isPost) {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                if ($model->save()){
                    Yii::$app->session->setFlash('success', 'Изменения сохранены');
                }else{
                    Yii::$app->session->setFlash('error', 'Ошибка прим сохранении');
                }
                return $this->redirect('profile/setting');
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);

    }
    public function actionCourse()
    {
        $user = User::find()->where(['status' => User::STATUS_ACTIVE])->all();
        return $this->render('course', [
            'user' => $user,
        ]);
    }
    public function actionCreateKid(){
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
                return $this->redirect('/profile/setting');
            }else{
                Yii::$app->session->setFlash('error', 'Ошибка при заполнении формы');
            }
        }

        return $this->render('createKid', [
            'model' => $model,
        ]);
    }
    public function actionUpdateKid($id){
        $model = Kid::findOne($id);
        if (Yii::$app->request->isPost) {
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                if ($model->save()){
                    Yii::$app->session->setFlash('success', 'Данные ребенка успешно изменены');
                }else{
                    Yii::$app->session->setFlash('error', 'Ошибка прим сохранении');
                }
                return $this->redirect('/profile/setting');
            }
        }
        $model->loadDefaultValues(false);
        return $this->render('createKid', [
            'model' => $model,
        ]);
    }
    public function actionDeleteKid($id) {
        $kid = $this->findModel($id);
        $kid->is_deleted = 1;
        $kid->save();
        return $this->redirect(['/profile/setting']);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Kid the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Kid::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'Запрашиваемая страница не существует.'));
    }
}
