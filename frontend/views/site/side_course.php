<?php

use common\models\Course;

$courseList = Course::find()->limit(4)->all();

?>
<section class="course-section">
    <div class="main-container">
        <div class="course">
            <div class="main-title mb-5">
                <p>Курсы</p>
            </div>
            <div class="c-content">
                <div class="course-block landing-cards welcome-slick">
                    <?foreach ($courseList as $course):?>
                        <a href="/course/view?id=<?=$course->id;?>" class="main-card-shadow c-card">
                            <div class=""></div>
                            <div class="c-card-body">
                                <p class="card-title"><?=$course->title?></p>


                                <p class="c-card-text"><?= \frontend\controllers\SiteController::getShortText($course->description)?></p><!-- вывод результата с 3 точками в конце-->
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
                    <?endforeach;?>
                </div>
            </div>
        </div>
    </div>
    <p class="button btn-course">
        Все курсы
        <a href="/course"></a>
    </p>
</section>
