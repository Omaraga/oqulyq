<?php
/* @var $this yii\web\View */
/* @var $check_news frontend\controllers\SiteController */
/* @var $dataProvider \yii\data\ActiveDataProvider */

use yii\helpers\Url;
$settings = \common\models\Settings::find()->one();
$this->title = 'Учебники';

?>
<main class="landing container">
    <h1 class="my-3 text-center">Учебники</h1>
    <div class="row">
        <div class="col-12 mt-2">
            <form action="/site/books" method="get" class="row">
                <div class="col-10">
                    <input type="text" name="search" class="form-control" value="<?=$search;?>">
                </div>
                <div class="col-2">
                    <button class="btn btn-primary w-100">Поиск</button>
                </div>
            </form>
        </div>
        <div class="col-12 mt-2">
            <div class="row p-3">
                <?foreach ($dataProvider->getModels() as $model):?>
                    <a href="<?=$model->url;?>" class="col-3 card p-3 mb-2" target="_blank">
                        <div class="img-block mb-2" style="height: 300px; background-position: center; background-repeat: no-repeat; background-size: cover; background-image: url(<?=$model->img;?>);">

                        </div>
                        <p style="font-weight: 500; font-size: 16px;"><?=$model->name;?></p>
                    </a>
                <?endforeach;?>
            </div>
        </div>

    </div>

</main>
