<?php
/* @var $this \yii\web\View*/

$settings = \common\models\Settings::find()->one();
$this->title = 'Личный кабинет';
$this->params['breadcrumbs'][] = $this->title;
$js = <<<JS
    $('.part-slick').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
    });
JS;
$this->registerJs($js);
?>



<main class="main-course">
    <div class="container-fliud">
        <div class="row">
            <div class="col-12 col-md-9">
                <div class="course-banner mb-5">
                    <h1>Курсы</h1>
                </div>
                <div class="search-panel">
<!--                    <div class="dropdown">-->
<!--                        <button class="btn dropdown-toggle btn-border" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">-->
<!--                            по популярности-->
<!--                        </button>-->
<!--                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">-->
<!--                            <a class="dropdown-item" href="#">Action</a>-->
<!--                            <a class="dropdown-item" href="#">Another action</a>-->
<!--                            <a class="dropdown-item" href="#">Something else here</a>-->
<!--                        </div>-->
<!--                    </div>-->

                    <div style="width: 50%;">
                        <p class="text-right"><a href="">Все курсы</a></p>
<!--                        <div class="input-group mt-3">-->
<!--                            <input type="text" class="form-control search" id="basic-url" aria-describedby="basic-addon3">-->
<!--                        </div>-->
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-end mt-5">
                    <p class="card-title">Скоро вы попробуете</p>
                </div>
                <div class="d-flex justify-content-between flex-wrap mt-5">
                    <? foreach ($courses as $course):?>
                    <a href="/cabinet/course/view?id=<?=$course->id;?>" class="main-card-shadow card-three">
                        <div class=""></div>
                        <div class="c-card-body">
                            <p class="fs-16 fw-5"><?=$course->title?></p>


                            <p class="fs-13 fw-4 mt-2"><?= \frontend\controllers\SiteController::getShortText($course->description)?></p><!-- вывод результата с 3 точками в конце-->
                            <hr class="mt-5">
                            <div class="d-flex align-items-center justify-content-between">
                                <?if (empty($course->level)):?>
                                    <div class="d-flex align-items-baseline">
                                        <div class="banner-rating banner-rating-one bg-green"></div>
                                        <div class="mx-1 banner-rating banner-rating-two"></div>
                                        <div class="mr-2 banner-rating banner-rating-three"></div>
                                        <span><?=$course->level?></span>
                                    </div>
                                <?endif;?>
                                <?if (!empty($course->price)):?>
                                    <p class="c-card-sum"><?=$course->price?> тг</p>
                                <?endif;?>
                            </div>
                        </div>
                    </a>
                    <? endforeach;?>
                </div>
            </div>
            <div class="col-12 col-md-3">
<!--                <div class="card-main">-->
<!--                    <p class="color-green fs-25">Аux Call</p>-->
<!--                    <p class="text-subTetx">Оставить заявку</p>-->
<!--                    <button class="btn bg-green">Отправить</button>-->
<!--                </div>-->
                <div class="card-main">
                    <p class="text-subText">Социальные сети</p>
                    <ul class="nav-soc d-flex">
                        <li class="nav-soc__item bg-green"><a href="<?=$settings->vk;?>"><img src="/img/course/wk-soc.svg" alt="" class="nav-soc__img"></a></li>
                        <li class="nav-soc__item bg-green"><a href="<?=$settings->facebook;?>"><img src="/img/course/facebook-soc.svg" alt="" class="nav-soc__img"></a></li>
                        <li class="nav-soc__item bg-green"><a href="<?=$settings->instagram;?>"><img src="/img/course/inst-soc.svg" alt="" class="nav-soc__img"></a></li>
                        <li class="nav-soc__item bg-green"><a href="<?=$settings->youtube;?>"><img src="/img/course/youtube-soc.svg" alt="" class="nav-soc__img"></a></li>
                        <li class="nav-soc__item bg-green"><a href="<?=$settings->whatsapp;?>"><img src="/img/course/whatsapp-soc.svg" alt="" class="nav-soc__img"></a></li>
                    </ul>
                </div>
                <a style="display: none" href="/course/view?id=">
                    <div class="card-shadow prof-card-info">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <div class="d-flex align-items-baseline">
                                    <div class="banner-rating banner-rating-one bg-green"></div>
                                    <div class="mx-1 banner-rating banner-rating-two"></div>
                                    <div class="mr-2 banner-rating banner-rating-three"></div>
                                    <span>Средний</span>
                                </div>
                                <h4>qwerty</h4>
                            </div>
                            <div class="col-3 text-center course-preview" style="background-image: url('<?=$course->preview;?>')"></div>
                        </div>
                        <p class="d-flex align-items-center justify-content-between mt-4">
                            <img src="" alt="">
                            <span><span>Продолжить просмотр </span> 1. 1 урок</span>
                            <span class="txt-green"><img  class="mr-1" src="/img/course/success-icon.svg" alt="">100%</span>
                        </p>
                        <div class="progress mt-2">
                            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</main>
