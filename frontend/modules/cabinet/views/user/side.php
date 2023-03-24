<?php
use yii\helpers\Html;
$user = \common\models\User::findOne(Yii::$app->user->identity['id']);

?>
<div class="card-shadow prof-card">
    <?if ($user->id = 0):?>
    <img class="img-prof" src="/img/course/user-img.jpg" alt="">
    <?else:?>
        <div class="header-user d-xl-flex">
            <div class="circle-st header-circle" style="background: green; height: 100px;width: 100px; text-align: center; font-size: 60px; border-radius: 50px">
                <span class="user-avatar"><?= $user ? $user->getShortName():''?></span>
            </div>
        </div>
    <?endif;?>
    <p class="card-title"><?=$user->getFi()?></p>
    <? if (!$user->CountKids == 0):?>
        <p class="card-subTitle"><?=$user->CountKids;?> детей</p>
    <?endif;?>
</div>

<div class="card-shadow prof-card-info">
    <p class="prof-card-info__text mb-3">Курс</p>
    <p class="page-subTitle mb-4">Уход за ребенком</p>
    <p class="d-flex align-items-center justify-content-between">
        <span>1/13 тестов</span>
        <span>28/169 уроков</span>
        <span class="txt-green"><img  class="mr-1" src="/img/course/success-icon.svg" alt="">100%</span>
    </p>
    <div class="progress mt-2">
        <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
</div>
