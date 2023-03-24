<?php
namespace frontend\modules\cabinet\controllers;

use common\models\User;
use frontend\models\PasswordResetRequestForm;
use Yii;
use frontend\modules\cabinet\components\BaseCabinetController as Controller;
use common\models\City;
use common\models\Region;

class UserController extends Controller
{

    public function actionIndex(){

        if (Yii::$app->user->isGuest) {
            return $this->redirect('/');
        }
        $model = User::findOne(Yii::$app->user->identity['id']);

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionUpdate(){

        $model = User::findOne(['id'=>Yii::$app->user->identity['id']]);

        if (Yii::$app->request->isPost) {
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                if ($model->save()){
                    Yii::$app->session->setFlash('success', 'Изменения сохранены');
                }else{
                    Yii::$app->session->setFlash('error', 'Ошибка прим сохранении');
                }
                return $this->redirect('index');
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }
    public function actionSecurity(){

        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            }

            Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
        }

        return $this->render('security', [
            'model' => $model,
        ]);
    }

    public function actionCheck(){
        $helloWorld = 'test 123';
        return $this->render('checkNumber', [
            'helloWorld' => $helloWorld,
        ]);
    }
    public function actionListsRegion($id)
    {
        $countCity = Region::find()
            ->where(['country_id' => $id])
            ->count();

        $cities = Region::find()
            ->where(['country_id' => $id])
            ->all();

        if($countCity > 0 )
        {
            foreach($cities as $city ){
                echo "<option value='".$city->id."'>".$city->name."</option>";
            }
        }
        else{
            echo "<option> - </option>";
        }

    }
    public function actionListsCity($id)
    {
        $countCity = City::find()
            ->where(['region_id' => $id])
            ->count();

        $cities = City::find()
            ->where(['region_id' => $id])
            ->all();

        if($countCity > 0 )
        {
            foreach($cities as $city ){
                echo "<option value='".$city->id."'>".$city->name."</option>";
            }
        }
        else{
            echo "<option> - </option>";
        }

    }
}