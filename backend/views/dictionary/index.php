<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $type string */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title  = Yii::$app->controller->modelLabel;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">
    <p>
        <?= Html::a(Yii::t('app', 'Создать'), ['create', 'type' => $type], ['class' => 'btn btn-success']) ?>
    </p>

    <ul class="nav nav-pills my-3">
        <?foreach (\common\models\Dictionary::getTypes() as $item => $value):?>
            <li class="nav-item">
                <a class="nav-link <?=$type == $item? 'active':'';?>" href="<?=\yii\helpers\Url::to(['dictionary/index', 'type' => $item]);?>"><?=$value;?></a>
            </li>
        <?endforeach;?>
    </ul>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'formatter' => [

            'class' => '\yii\i18n\Formatter',

            'dateFormat' => 'dd.MM.yyyy',

            'datetimeFormat' => 'dd.MM.yyyy HH:mm::ss',

        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'ru',
            'kz',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action,  $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
