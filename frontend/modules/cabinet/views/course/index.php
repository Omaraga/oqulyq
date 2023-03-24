<?php
/* @var $this yii\web\View */
/* @var $courseList common\models\Course[] */
?>
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
            <p><?=Yii::t('main', 'Курсы')?></p>
        </div>
        <hr class="d-none d--lg-block">
        <div class="course-content mt-5">
            <div class="course-card__block">
                <?foreach ($courseList as $course):?>
                    <a href="course/view?id=<?=$course->id;?>">
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
<!--                            <p class="d-flex align-items-center justify-content-between mt-4">-->
<!--                                <span>1/13 тестов</span>-->
<!--                                <span>28/169 уроков</span>-->
<!--                                <span class="txt-green"><img  class="mr-1" src="/img/course/success-icon.svg" alt="">100%</span>-->
<!--                            </p>-->
<!--                            <div class="progress mt-2">-->
<!--                                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>-->
<!--                            </div>-->
                        </div>
                    </a>
                <?endforeach;?>
            </div>
        </div>
    </div>
</main>

