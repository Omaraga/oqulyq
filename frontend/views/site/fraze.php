<?php
/* @var $this yii\web\View */
/* @var $check_news frontend\controllers\SiteController */
/* @var $courseList common\models\Course[] */
/* @var $newsList common\models\News[] */
/* @var $partners common\models\Partners */

use yii\helpers\Url;
$settings = \common\models\Settings::find()->one();


?>
<main class="landing container">
    <div class="row">
        <div class="col-12 mt-5">
            <form action="/site/fraze" method="get" class="row">
                <div class="col-10">
                    <input type="text" name="search" class="form-control" value="<?=$search;?>">
                </div>
                <div class="col-2">
                    <button class="btn btn-primary w-100">Поиск</button>
                </div>
            </form>
        </div>
        <div class="col-12 mt-2">
            <?= \yii\grid\GridView::widget([
                'dataProvider' => $dataProvider,
                'showHeader'=> false,
                'summary' => '',
                'formatter' => [

                    'class' => '\yii\i18n\Formatter',

                    'dateFormat' => 'dd.MM.yyyy',

                    'datetimeFormat' => 'dd.MM.yyyy HH:mm::ss',

                ],
                'columns' => [
                    'ru',
                    'kz',
                    [
                        'value' => function($data){
                            $google =  \yii\helpers\Html::a('<img src="/img/gtranslate.png" style="width: 20px;">', 'https://translate.google.com/?hl=ru&sl=ru&tl=kk&text='.$data->ru.'&op=translate', ['target' => '_blank']);
                            $yandex =  \yii\helpers\Html::a('<img src="/img/ytranslate.png" style="width: 20px;">', 'https://translate.yandex.ru/?source_lang=ru&target_lang=kk&text='.$data->ru, ['target' => '_blank', 'class' => 'ml-3']);
                            return $google.$yandex;
                        },
                        'format' => 'raw'
                    ]
                ],
            ]); ?>
        </div>

    </div>

</main>
