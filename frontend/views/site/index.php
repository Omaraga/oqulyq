<?php
/* @var $this yii\web\View */
/* @var $lessons \common\models\Lesson[] */

use yii\helpers\Url;
$settings = \common\models\Settings::find()->one();
$this->title = 'Уроки';
$i = 1;

?>
<style>
    .landing .card h5 {
        -webkit-line-clamp: 2;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 50px;
    }
</style>
<main class="landing container">
    <h1 class="my-3 text-center">Уроки</h1>
    <div class="row">
        <div class="col-12 mt-2">
            <div class="row p-3">
                <?foreach ($lessons as $lesson):?>
                    <div class="col-3 card p-3 m-2" style="background-color: #F3F6FC;border-radius: 5px;border: none;">
                        <h5 style="font-weight: 500;"><?=$lesson->title;?></h5>
                        <p class="mt-2"><?=$lesson->getShortContent();?></p>
                        <div class="mt-4" style="display: flex; flex-direction: row; justify-content: space-between;">
                            <a href="/lesson/index?id=<?=$lesson->id;?>" class="btn btn-default" style="background-color: #fff;border-radius: 12px;color: #565ADD;">Перейти</a>
                            <p style="color: #c4c7f3; font-size: 25px;"><?=$i < 10 ? '0'.$i : $i;?></p>
                        </div>
                    </div>
                <?$i++;?>
                <?endforeach;?>
            </div>
        </div>

    </div>

</main>
