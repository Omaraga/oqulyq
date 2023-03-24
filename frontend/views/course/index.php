<?php
/* @var $this yii\web\View */
/* @var $courseList common\models\Course[] */
?>
<link rel="stylesheet" href="/css/app.css">

<style>
    .course_card{
        display: block;
        height: 200px;
        border-radius: 15px;
        padding: 15px 25px;
        box-shadow: -4px 1px 6px 0px rgb(15 1 24 / 10%);
    }
    .course_card:hover{
        transform: scale(1.02);
        transition: transform .3s;
    }
    .course-preview{
        border-radius: 10px;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        height: 100px;
    }
    .course-card-theme li{
        float: left;
        background-color: #00513e;
        color: white;
        margin-right: 5px;
        padding: 3px 7px;
    }
</style>
<main>
    <div class="main-container">
        <div class="main-title">
            <p style="margin: 5vh 0"><?=Yii::t('main', 'Курсы')?></p>
        </div>
        <hr class="d-none d--lg-block">
<!--        <div class="input-group d-flex d-lg-none">-->
<!--            <input type="text" class="form-control" placeholder="--><?//=Yii::t('main', 'Поиск курсов');?><!--">-->
<!--            <div class="input-group-append">-->
<!--                <button class="btn btn-secondary bg-green" type="button">-->
<!--                    <i class="fa fa-search"></i>-->
<!--                </button>-->
<!--            </div>-->
<!--        </div>-->
        <div class="course-content mt-5">
<!--            <div class="settings d-none d-lg-block">-->
<!--                <div class="settings__theme">-->
<!--                    <div class="input-group">-->
<!--                        <input type="text" class="form-control" placeholder="--><?//=Yii::t('main', 'Поиск курсов');?><!--">-->
<!--                        <div class="input-group-append">-->
<!--                            <button class="btn btn-secondary bg-green" type="button">-->
<!--                                <i class="fa fa-search"></i>-->
<!--                            </button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <p class="settings__title mt-4"><b>--><?//=Yii::t('main', 'Тематика')?><!--</b></p>-->
<!--                    <div class="course-themes">-->
<!--                        --><?//foreach (\common\models\Theme::getThemeList() as $theme):?>
<!--                            <div class="settings__checkbox">-->
<!--                                <input type="checkbox" name="theme">-->
<!--                                <p>--><?//=$theme->title;?><!--</p>-->
<!--                            </div>-->
<!--                        --><?//endforeach;?>
<!--                        <div class="settings-theme__text">-->
<!--                            <a href="#">ЕЩЕ 61 ТЕМАТИКА</a>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!--            </div>-->
            <div class="course-card__block">
                <?foreach ($courseList as $course):?>
                    <a href="/course/view?id=<?=$course->id;?>">
                        <div class="card-shadow prof-card-info">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
<!--                                    <div class="d-flex align-items-baseline">-->
<!--                                        <div class="banner-rating banner-rating-one bg-green"></div>-->
<!--                                        <div class="mx-1 banner-rating banner-rating-two"></div>-->
<!--                                        <div class="mr-2 banner-rating banner-rating-three"></div>-->
<!--                                        <span>Средний</span>-->
<!--                                    </div>-->
                                    <h4><?=$course->title;?></h4>
                                </div>
                                <div class="col-3 text-center course-preview" style="background-image: url('<?=$course->preview;?>')"></div>
                            </div>
                            <p class="d-flex align-items-center justify-content-between mt-4">
<!--                                <span>1/13 тестов</span>-->
                                <span>16 уроков</span>
                                <span><?=$course->price?> тенге</span>
<!--                                <span class="txt-green"><img  class="mr-1" src="/img/course/success-icon.svg" alt="">100%</span>-->
                            </p>
<!--                            <div class="progress mt-2">-->
<!--                                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>-->
<!--                            </div>-->
                        </div>
                    </a>
                <?endforeach;?>
            </div>
        </div>
    </div>
    <section class="partners-section">
        <div class="partners-back course-posit">
            <div class="row">
                <div class="col-12 col-lg-6  mt-5 mt-lg-0">
                    <div class="partners-form" action="">
                        <p class="partners-form-title mb-3">Поможем в выборе!</p>
                        <p class="partners-form-text">Если у вас есть вопросы о формате или вы не знаете, что выбрать, оставьте свой номер - мы позвоним, чтобы ответить на все ваши вопросы.</p>
                    </div>
                </div>
                <div class="col-12 col-lg-6 mt-5 mt-lg-0 mb-5 mb-lg-0">
                    <input type="text" class="form-input mb-3 full-img" placeholder="Имя">
                    <input type="text" class="form-input form-input-size" placeholder="Телефон">
                    <input type="text" class="form-input form-input-size" placeholder="Электронная почта">
                    <div class="d-flex align-items-center justify-content-between flex-wrap flex-md-nowrap mt-4">
                        <p class="text-white partners-form-text">Нажимая на кнопку я соглашаюсь на обработку персональных данных</p>
                        <p class="button w-sight__button mt-4 mt-md-0">
                            Отправить
                            <a href=""></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

