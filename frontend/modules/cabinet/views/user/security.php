<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Смена пароля';
$this->params['breadcrumbs'][] = $this->title;
?>

<main class="main-course">
    <div class="container-fliud">
        <div class="row">
            <div class="col-9">
                <div class="site-reset-password">
                    <h1><?= Html::encode($this->title) ?></h1>

                    <p>Пожалуйста введите новый пароль:</p>

                    <div class="row">
                        <div class="col-lg-5">

                        </div>
                    </div>
                </div>

            </div>

            <div class="col-3">
                <?=$this->render('@app/modules/cabinet/views/user/side.php')?>
            </div>
        </div>
    </div>
</main>