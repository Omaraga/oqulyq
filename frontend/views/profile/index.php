<?php
/* @var $this yii\web\View*/
/* @var $user common\models\User*/
/* @var $kid common\models\Kid */
/* @var $changeDataForm frontend\models\forms\ChangeDataForm*/
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$user = Yii::$app->user->identity;
?>

<main class="main-course">
    <div class="container-fliud">
        <div class="row">
            <div class="col-3">
                <div class="card-shadow prof-card">
                    <img class="img-prof" src="/img/course/user-img.jpg" alt="">
                    <p class="card-title">Белескызы Инжу</p>
                    <p class="card-subTitle">Мама 2 детей</p>
                </div>
            </div>
            <div class="col-9">
                <div class="d-flex align-items-center mb-3">
                    <a class="prof-link bg-green" href="">купленные курсы (25) </a>
                    <a class="prof-link" href="">проиденные курсы (2) </a>
                    <a class="prof-link" href="">сертификаты </a>
                </div>
                <div class="card-shadow prof-banner mb-3">
                    <div class="prof-banner__block">
                        <div>
                            <div class="d-flex align-items-baseline">
                                <span class="bg-green prof-banner__info">КУРС</span>
                                <div class="ml-3 banner-rating banner-rating-one bg-green"></div>
                                <div class="mx-1 banner-rating banner-rating-two"></div>
                                <div class="mr-2 banner-rating banner-rating-three"></div>
                                <span>Средний</span>
                            </div>
                            <p class="prof-banner__title d-block">Уход за ребенком</p>
                        </div>
                        <div class="d-flex align-items-baseline">
                            <div class="d-flex align-items-baseline">
                                <img src="/img/course/video-icon.svg" alt="">
                                <p>1/3 <small class="d-block">тестов</small></p>
                            </div>
                            <div class="d-flex align-items-baseline mx-5">
                                <img src="/img/course/file-icon.jpg" alt="">
                                <p>1/3 <small class="d-block">тестов</small></p>
                            </div>
                            <div class="d-flex align-items-baseline">
                                <img src="/img/course/success-icon.svg" alt="">
                                <p>1/3 <small class="d-block">тестов</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="prof-banner__block ">
                        <a href="#" class="banner-over"><img src="/img/course/play.svg" alt=""> <span>Продолжить просмотр</span> 1. 1 Что нужно знать дизайнеру </a>
                        <img src="/img/logo.png" alt="">
                    </div>
                    <a href="" class="prof-banner__link"></a>
                </div>
            </div>
        </div>
    </div>
</main>
