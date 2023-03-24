<?php
use yii\helpers\Html;
use common\models\News;
use yii\helpers\Url;

$newsList = News::find()->where(['status' => News::STATUS_PUBLISH])->orderBy(['created_at' => SORT_DESC])->limit(4)->all();
?>

<section class="news-section">
    <div class="container">
        <div class="news">
            <div class="main-title">
                <p>Последние новости</p>
            </div>
            <div class="n-content main-content welcome-slick">
                <div class="card n-card">
                    <img class="n-card__img" src="<?= $newsList ? $newsList[0]->image : ''?>" alt="">
                    <div class="n-card__info ">
                    </div>
                    <p class="n-card__title"><?= $newsList ? \frontend\controllers\SiteController::getShortText($newsList[0]->title, 5) : ''?></p>
                    <a href="<?=Url::to(['/news/view','id'=>($newsList ? $newsList[0]->id : ''), 'name'=>$newsList ? $newsList[0]->title : ''])?>">
                        <p class="n-card__link">Подробнее <img src="/img/icon/arrow-right-icon.svg" alt=""></p>
                    </a>
                    <p class="n-card__text"><?= date("d.m.Y г.", ($newsList ? $newsList[0]->created_at: time())) ?></p>
                </div>
                <div class="n-cards__block d-none d-lg-block">
                    <? foreach ($newsList as $k => $item): ?>
                        <? if ($k == 0) continue;?>
                        <div class="n-cards__item">
                            <img src="<?= $item->image ?>" alt="" class="n-item__img">
                            <div class="n-item__info">
                                <div class="n-card__info">
                                </div>
                                <p class="n-item__title"><?= \frontend\controllers\SiteController::getShortText($item->title, 5) ?></p>
                                <a href="<?=Url::to(['/news/view','id'=>$item->id, 'name'=>$item->title])?>">
                                    <p class="n-card__link">Подробнее <img src="/img/icon/arrow-right-icon.svg" alt=""></p>
                                </a>
                                <p class="n-item__text"><?= date("d.m.Y г.", $item->created_at) ?></p>
                            </div>
                        </div>
                    <? endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
