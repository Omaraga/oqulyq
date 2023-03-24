<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="error">
    <div class="site-error">
        <div class="d-flex align-items-center" style="flex-direction: column">
            <img class="img-error" src="/img/404-text.svg" alt="">
            <p class="text-white text-center text-error mt-3 mb-5"> Страница не найдена переходите на страницу главного или посмотрите карту  сайта. извиняемся за принесенные неудобство</p>
            <a class="error-btn text-white" href="/">Главная</a>
        </div>
    </div>
</div>
<div style="margin-top: 10vh"></div>


<?=$this->render('@app/views/site/side_course.php')?>
