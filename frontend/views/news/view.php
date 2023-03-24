<?php
/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $news app\models\News */
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = $model->title;
$this->params['breadcrumbs'][] = $this->title;
?>
<main style="margin-bottom: 30vh">
   <div class="main-container">
       <div class="row mt-5">
           <div class="col-12 col-lg-8">
               <div class="main-title">
                   <p class="text-left"><?= $model->title; ?></p>
               </div>
<!--               <div class="news-view-main-info mb-3">-->
<!--                   <div class="d-flex">-->
<!--                       <p>курс</p>-->
<!--                       <p>курс</p>-->
<!--                       <p>курс</p>-->
<!--                   </div>-->
<!--                   <span class="w-4" style="color: #000;">Примерное время чтение : 10 минут</span>-->
<!--               </div>-->
               <p class="mt-3 mb-5 news-card__date">Дата публикации новости: <?= date("d.m.Y г.", $model->created_at)?>.</p>
               <img class="news-img" src="<?= $model->image?>">

               <p class="w-3"><?= $model->content; ?></p>

<!--               <p class="main-subTitle mt-5 mb-4">Написать комментарии</p>-->
<!--               <div class="card-border position-relative mb-5 px-2 p-sm-3">-->
<!--                   <textarea class="news-textarea mt-4" name="" id="" cols="50"></textarea>-->
<!--                   <hr>-->
<!--                   <div class="row align-items-start px-3">-->
<!--                       <div class="d-flex justify-content-between col-12 col-md-10 pl-0">-->
<!--                           <div class="d-flex">-->
<!--                               <img class="news-img-user" src="/img/course/image-header.jpg" alt="">-->
<!--                               <p class="w-7">Аббазов Арманбек <span class="txt-view d-block w-4">4 дня назад </span></p>-->
<!--                           </div>-->
<!--                           <div class="text-right d-none d-sm-block">-->
<!--                               <p class="w-7">21. 11. 1997</p>-->
<!--                               <p class="w-7">Казахстан, Астана</p>-->
<!--                           </div>-->
<!--                       </div>-->
<!--                       <button class="btn bg-green mt-5 mt-md-0 col-5 col-md-2">Сохранить</button>-->
<!--                   </div>-->
<!--                   <div class="news-card__info">-->
<!--                       <img src="/img/star-green.svg" alt="">-->
<!--                       <img src="/img/star-green.svg" alt="">-->
<!--                       <img src="/img/star-green.svg" alt="">-->
<!--                       <img src="/img/star-gray.svg" alt="">-->
<!--                       <img src="/img/star-gray.svg" alt="">-->
<!--                       <p>5.0</p>-->
<!--                   </div>-->
<!--               </div>-->
<!---->
<!--               <p class="main-subTitle mt-5 mb-4">комментарии</p>-->
<!--               <div class="card-border p-3 p-sm-3 mb-5">-->
<!--                   <div class="d-flex justify-content-between">-->
<!--                       <div class="d-flex">-->
<!--                           <img class="news-img-user" src="/img/course/image-header.jpg" alt="">-->
<!--                           <p class="w-7">Аббазов Арманбек <span class="txt-view d-block w-4">4 дня назад </span></p>-->
<!--                       </div>-->
<!--                       <div class="news-card__info position-static" style="border-radius: 18px">-->
<!--                           <img src="/img/star-green.svg" alt="">-->
<!--                           <p>5.0</p>-->
<!--                       </div>-->
<!--                   </div>-->
<!--                   <hr>-->
<!---->
<!--                   <p class="w-7">Здравствуйте! Результат вашей работы прикрепил к письму. Жду ответа, спасибо!</p>-->
<!---->
<!--                   <div class="text-left w-7 mt-5">-->
<!--                       <p class="w-7">21. 11. 1997</p>-->
<!--                       <p class="w-7">Казахстан, Астана</p>-->
<!--                   </div>-->
<!--               </div>-->
           </div>
           <div class="col-4 mt-3 d-none d-lg-block mb-4">
               <p class="news-card__title">похожие новости</p>
               <?foreach ($news as $new):?>
               <div class="main-card-shadow news-view-card__sidInfo d-flex p-3 mb-3">
                   <img class="mr-2" src="<?=$new->image?>" alt="">
                   <div>
                       <p class="news-card__date"><?=date("d.m.Y г.", $new->created_at)?></p>
                       <p class="w-7 mt-1"><?=$new->title?></p>
                   </div>
                   <img src="/img/view-arrow-right.svg" alt="" class="news-view-card__img">
                   <a href="<?=Url::to(['/news/view','id'=>$new->id, 'name'=>$new->title])?>" class="news-card__link"></a>
               </div>
                <?endforeach;?>
           </div>
       </div>
   </div>
</main>

