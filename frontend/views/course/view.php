<?php
/* @var $this yii\web\View */
/* @var $course common\models\Course */
?>
<link rel="stylesheet" href="/css/cabinet.css">

<main class="main-course">
    <div class="row">
        <div class="col-12 col-lg-8 mt-5">
            <p class="page-title mt-4"><?=$course->title;?></p>
            <small>Примерное время прохождение курса : 3 недели </small>
            <img class="full-img" src="<?=$course->preview?>" alt="">
            <small><?=!($course->created_at == null) ? 'Дата публикации курса' . date("d.m.Y г.", $course->created_at) : ''?></small>
            <p><?=$course->created_at;?></p>
            <div class="view-card-border my-3 d-block d-lg-none">
                <div class="main-title mb-4">
                    <p class="my-0"><?=$course->price?> тг</p>
                </div>
                <a class="btn bg-green full-img mb-2 fw-5" href="/course/buy?id=<?=$course->id?>"> Купить</a>

            </div>

            <!--                <p class="page-subTitle mb-2 mt-5">Уход</p>-->
            <!--                <p class="text-txt">Уход – это непростой и трудоемкий процесс с котором сталкиваются все матери.</p>-->
            <!--                <p class="text-txt mt-2 mb-5">Недостаток знаний в этой области может серьезно затормозить процесс развития и привести к нежелательным результатам.</p>-->

            <p class="page-subTitle mb-2">Чему вы научитесь</p>
            <p class="view-text"><?=$course->description;?></p>
            <!---->
            <!--                <p class="page-subTitle">Ведущие курса</p>-->
            <!--                <p class="text-txt mb-5">Курс поможет вам избежать типичных ошибок и не навредить. Опытные врачи-педиатры поделятся своим опытом в рамках обучения. </p>-->

            <!--                <div class="d-flex align-items-center justify-content-between mb-4">-->
            <!--                    <div>-->
            <!--                        <img src="/img/course/buy-card.jpg" alt="">-->
            <!--                        <p class="page-subTitle">Антон Павлович</p>-->
            <!--                        <small>Специалист по аутизму</small>-->
            <!--                    </div>-->
            <!--                    <div class="d-none d-lg-block mx-3">-->
            <!--                        <img src="/img/course/buy-card.jpg" alt="">-->
            <!--                        <p class="page-subTitle">Антон Павлович</p>-->
            <!--                        <small>Специалист по аутизму</small>-->
            <!--                    </div>-->
            <!--                    <div class="d-none d-lg-block">-->
            <!--                        <img src="/img/course/buy-card.jpg" alt="">-->
            <!--                        <p class="page-subTitle">Антон Павлович</p>-->
            <!--                        <small>Специалист по аутизму</small>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!---->
            <!--                <p class="page-subTitle mb-2 mt-3">Файлы учебных материалов</p>-->
            <!--                <p class="text-txt mb-4">Курс поможет вам избежать типичных ошибок и не навредить. Опытные врачи-педиатры поделятся своим опытом в рамках обучения. </p>-->
            <!---->
            <!--                <div class="file-lesson">-->
            <!--                    <img src="/img/course/file-lesson.svg" alt="">-->
            <!--                    <p>Конспект или презентация предстоящего урока</p>-->
            <!--                </div>-->
            <!--                <div class="file-lesson">-->
            <!--                    <img src="/img/course/file-lesson.svg" alt="">-->
            <!--                    <p>Конспект или презентация предстоящего урока</p>-->
            <!--                </div>-->
            <!--                <div class="file-lesson">-->
            <!--                    <img src="/img/course/file-lesson.svg" alt="">-->
            <!--                    <p>Конспект или презентация предстоящего урока</p>-->
            <!--                </div>-->
            <!--                <div class="file-lesson">-->
            <!--                    <img src="/img/course/file-lesson.svg" alt="">-->
            <!--                    <p>Конспект или презентация предстоящего урока</p>-->
            <!--                </div>-->
            <!--                <div class="file-lesson">-->
            <!--                    <img src="/img/course/file-lesson.svg" alt="">-->
            <!--                    <p>Конспект или презентация предстоящего урока</p>-->
            <!--                </div>-->
            <!--                <p class="main-subTitle mt-5 mb-2">Отзывы</p>-->
            <!---->
            <!--                <div class="card-border p-3 p-sm-3 my-4 col-12">-->
            <!--                    <div class="d-flex justify-content-between">-->
            <!--                        <div class="d-flex">-->
            <!--                            <img class="news-img-user" src="/img/course/image-header.jpg" alt="">-->
            <!--                            <p class="w-7">Аббазов Арманбек <span class="txt-view d-block w-4">4 дня назад </span></p>-->
            <!--                        </div>-->
            <!--                        <div class="news-card__info position-static" style="border-radius: 18px">-->
            <!--                            <img src="/img/star-green.svg" alt="">-->
            <!--                            <p>5.0</p>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                    <hr>-->
            <!---->
            <!--                    <p class="w-7">Здравствуйте! Результат вашей работы прикрепил к письму. Жду ответа, спасибо!</p>-->
            <!---->
            <!--                    <div class="text-left w-7 mt-5">-->
            <!--                        <p class="w-7">21. 11. 1997</p>-->
            <!--                        <p class="w-7">Казахстан, Астана</p>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!---->
            <!--                <div class="card-border p-3 p-sm-3 my-4 col-12">-->
            <!--                    <div class="d-flex justify-content-between">-->
            <!--                        <div class="d-flex">-->
            <!--                            <img class="news-img-user" src="/img/course/image-header.jpg" alt="">-->
            <!--                            <p class="w-7">Аббазов Арманбек <span class="txt-view d-block w-4">4 дня назад </span></p>-->
            <!--                        </div>-->
            <!--                        <div class="news-card__info position-static" style="border-radius: 18px">-->
            <!--                            <img src="/img/star-green.svg" alt="">-->
            <!--                            <p>5.0</p>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                    <hr>-->
            <!---->
            <!--                    <p class="w-7">Здравствуйте! Результат вашей работы прикрепил к письму. Жду ответа, спасибо!</p>-->
            <!---->
            <!--                    <div class="text-left w-7 mt-5">-->
            <!--                        <p class="w-7">21. 11. 1997</p>-->
            <!--                        <p class="w-7">Казахстан, Астана</p>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <a class="course-link color-green fs-18 col-4" href="">Развернуть</a>-->


                            <div class="d-flex mt-4">
                                <?foreach ($promo_courses as $promo_course):?>
                                <div class="main-card-shadow mx-2 c-card">
                                    <div class=""></div>
                                    <div class="c-card-body">
                                        <p class="card-title"><?=$promo_course->title?></p>


                                        <p class="c-card-text"><?= \frontend\controllers\SiteController::getShortText($promo_course->description,7)?></p>
                                        <hr class="mt-5">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <?if (empty($promo_course->level)):?>
                                                <div class="d-flex align-items-baseline">
                                                    <div class="banner-rating banner-rating-one bg-green"></div>
                                                    <div class="mx-1 banner-rating banner-rating-two"></div>
                                                    <div class="mr-2 banner-rating banner-rating-three"></div>
                                                    <span><?=$promo_course->level?></span>
                                                </div>
                                            <?endif;?>
                                            <?if (!empty($promo_course->price)):?>
                                                <p class="c-card-sum"><?=$promo_course->price?> тг</p>
                                            <?endif;?>
                                        </div>
                                    </div>
                                </div>
                                <?endforeach;?>
                            </div>
        </div>

        <div class="col-4 mt-5 d-none d-lg-block">
            <div class="card-shadow prof-card-info">
                <div class="d-flex justify-content-between mb-4">
                    <div>
                        <!--                            <div class="d-flex align-items-baseline">-->
                        <!--                                <div class="banner-rating banner-rating-one bg-green"></div>-->
                        <!--                                <div class="mx-1 banner-rating banner-rating-two"></div>-->
                        <!--                                <div class="mr-2 banner-rating banner-rating-three"></div>-->
                        <!--                                <span class="fs-15">Средний</span>-->
                        <!--                            </div>-->
                        <p class="page-subTitle"><?=$course->title?></p>
                    </div>
                    <!--                        <img class="course-view-imgr" src="/img/course/course-view-img.jpg" alt="">-->
                </div>
                <p class="d-flex align-items-center justify-content-between">
                    <span>13 тестов</span>
                    <span>28 уроков</span>
                    <!--                        <span class="txt-green"><img  class="mr-1" src="/img/course/success-icon.svg" alt="">100%</span>-->
                </p>
                <!--                    <div class="progress mt-2">-->
                <!--                        <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>-->
                <!--                    </div>-->
            </div>

                            <div class="view-card-border mt-3">
                                <div class="main-title mb-4">
                                    <p class="my-0 fs-25 fw-5"><?=!($course->price == null) ? $course->price . ' ' . 'тг' : ''?></p>
                                </div>
<!--                                <div>-->
<!--                                    <img class="mr-2" src="/img/course/success-icon.svg" alt="">-->
<!--                                    <span>9 видео</span>-->
<!--                                </div>-->
                                <div class="d-flex mb-3">
                                    <div class="mr-3">
                                        <img class="mr-2" src="/img/course/success-icon.svg" alt="">
                                        <span>5 урока</span>
                                    </div>
<!--                                    <div>-->
<!--                                        <img class="mr-2" src="/img/course/success-icon.svg" alt="">-->
<!--                                        <span></span>-->
<!--                                    </div>-->
                                </div>

            <a class="btn bg-green full-img mb-2 fw-5" href="/course/buy?id=<?=$course->id?>"> Купить</a>
            <!--                    <a class="btn bg-green full-img mb-2 fw-5" data-toggle="modal" data-target="#contact-me">Купить</a>-->
            <!--                    <a class="btn border-green full-img fw-5" data-toggle="modal" data-target="#contact-me">Купить</a>-->

                            </div>

            <!--                <div class="view-card-border mt-4 p-3">-->
            <!--                    <p class="buy-card__title ml-3 fs-22">Программа курса</p>-->
            <!--                    <div class="view-card-border mb-3 toggle">-->
            <!--                        <div class="d-flex justify-content-between fs-18">-->
            <!--                            <p class="mb-0 fw-6">О чем этот курс</p>-->
            <!--                            <p>3:00</p>-->
            <!--                        </div>-->
            <!--                        <a href="" class="txt-green none toggle-text fs-16 fw-6">Предпросмотр</a>-->
            <!--                    </div>-->
            <!--                    <div class="view-card-border mb-3 toggle">-->
            <!--                        <div class="d-flex justify-content-between fs-18">-->
            <!--                            <p class="mb-0 fw-6">О чем этот курс</p>-->
            <!--                            <p>3:00</p>-->
            <!--                        </div>-->
            <!--                        <a href="" class="txt-green none toggle-text fs-16 fw-6">Предпросмотр</a>-->
            <!--                    </div>-->
            <!--                    <div class="view-card-border mb-3 toggle">-->
            <!--                        <div class="d-flex justify-content-between fs-18">-->
            <!--                            <p class="mb-0 fw-6">О чем этот курс</p>-->
            <!--                            <p>3:00</p>-->
            <!--                        </div>-->
            <!--                        <a href="" class="txt-green none toggle-text fs-16 fw-6">Предпросмотр</a>-->
            <!--                    </div>-->
            <!--                </div>-->
        </div>
    </div>
</main>