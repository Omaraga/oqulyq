<?php

?>

<main class="main-course">
    <div class="container-fliud">
        <div class="row">
            <div class="col-3">
                <?=$this->render('side.php')?>
            </div>
            <div class="col-9">
                <div class="d-flex align-items-center mb-3">
                    <a class="prof-link bg-green" href="profile">купленные курсы <?= $model->getCountCourse() > 0 ? '(' . $model->getCountCourse() . ')' : ''?></a>
<!--                    <a class="prof-link" href="">проиденные курсы  --><?//= $model->getCountCourse() < 0 ? '(' . $model->getCountCourse() . ')' : ''?><!-- </a>-->
<!--                    <a class="prof-link" href="profile/certificate">сертификаты  --><?//= $model->getCountCourse() < 0 ? '(' . $model->getCountCourse() . ')' : ''?><!--</a>-->
                </div>
                <? foreach($courses as $item):?>
                <div class="card-shadow prof-banner mb-3">
                    <div class="prof-banner__block">
                        <div>
                            <div class="d-flex align-items-baseline">
                                <span class="bg-green prof-banner__info">КУРС</span>
                                <div class="ml-3 banner-rating banner-rating-one bg-green"></div>
                                <div class="mx-1 banner-rating banner-rating-two"></div>
                                <div class="mr-2 banner-rating banner-rating-three"></div>
                                <span>Легкий</span>
                            </div>
                            <p class="prof-banner__title d-block"><?=\common\models\Course::findOne($item->course_id)->title?></p>
                        </div>
<!--                        <div class="d-flex align-items-baseline">-->
<!--                            <div class="d-flex align-items-baseline">-->
<!--                                <img src="/img/course/video-icon.svg" alt="">-->
<!--                                <p>1/3 <small class="d-block">тестов</small></p>-->
<!--                            </div>-->
<!--                            <div class="d-flex align-items-baseline mx-5">-->
<!--                                <img src="/img/course/file-icon.jpg" alt="">-->
<!--                                <p>1/3 <small class="d-block">тестов</small></p>-->
<!--                            </div>-->
<!--                            <div class="d-flex align-items-baseline">-->
<!--                                <img src="/img/course/success-icon.svg" alt="">-->
<!--                                <p>1/3 <small class="d-block">тестов</small></p>-->
<!--                            </div>-->
<!--                        </div>-->
                    </div>
                    <div class="prof-banner__block ">
                        <a href="/cabinet/course/watch?id=<?=$item->course_id?>" class="banner-over"><img src="img/course/play.svg" alt=""> <span>Продолжить просмотр</span></a>
                        <img src="/img/logo.png" alt="">
                    </div>
                    <a href="/cabinet/course/watch?id=<?=$item->course_id?>" class="prof-banner__link"></a>
                </div>
                <? endforeach;?>
            </div>
        </div>
    </div>
</main>