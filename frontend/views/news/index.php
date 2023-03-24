<?php
/* @var $this yii\web\View */
/* @var $this common\models\User */
/* @var $this common\models\News */
/* @var $news array */
/* @var $models common\models\News */
/* @var $sort yii\data\Sort */
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
?>
<main style="margin-bottom: 30vh">
   <div class="main-container">
       <div class="main-title" style="margin: 5vh 0">
           <p>Новости</p>
       </div>
       <div class="news-content">
           <div class="news-card__block">

<!--               <div style="margin: 10px 0; display: flex">-->
<!--                   <p style="margin-right: 10px">Сортировать по: </p>-->
<!--                   --><?//=$sort->link('date'); ?><!-- Сортировка по дате -->
<!--               </div>-->
               <? foreach ($models as $model):?>
               <div class="card-border news-card row">
                   <div class="col-12 col-md-3">
                       <img class="news-card__img img-full mb-4 mb-md-0" src="<?= $model->image ?>" alt="" >
                   </div>
                   <div class="col-12 col-md-9">
                       <p class="news-card__title d-flex justify-content-between"><?= $model->title ?> <span class="news-card__date mb-0 d-none d-lg-block"><?= date("d.m.Y г.", $model->created_at) ?></span></p>
                       <p class="news-card__date d-block my-2 d-lg-none" style="font-size: 14px"><?= date("d.m.Y г.", $model->created_at) ?></p>
                       <p class="news-card__text"><?= \frontend\controllers\NewsController::getShortText($model->content)?></p>
                       <a class="btn bg-green" href="<?=Url::to(['/news/view','id'=>$model->id, 'name'=>$model->title])?>">Прочитать</a>
                   </div>
                   <a class="news-card__link" href="<?=Url::to(['/news/view','id'=>$model->id, 'name'=>$model->title])?>"></a>
               </div>
               <? endforeach;?>

           </div>
       </div>
   </div>

</main>