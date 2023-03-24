<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use richardfan\sortable\SortableGridView;
use common\models\Course;

/* @var $this yii\web\View */
/* @var $course Course */
/* @var $menu string */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $students yii\data\ActiveDataProvider */

$this->title = $course->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Курсы'), 'url' => ['/course']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-index">


    <?= \yii\widgets\DetailView::widget([
        'model' => $course,
        'attributes' => [
            'id',
            'title',
            [
                'attribute' => 'type',
                'value' => function($data){
                    return Course::getTypes()[$data->type];
                }
            ],
            'price',

        ],
    ]) ?>
    <hr>
    <div class="mb-3">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link <?=($menu == 'structure')?'active':'';?>" href="<?=Url::to(['/course/settings', 'id' => $course->id, 'menu' => (string)'structure']);?>">Структура</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?=($menu == 'setting')?'active':'';?>" href="<?=Url::to(['/course/settings', 'id' => $course->id, 'menu' => (string)'setting']);?>">Настройки</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?=($menu == 'students')?'active':'';?>" href="<?=Url::to(['/course/settings', 'id' => $course->id, 'menu' => (string)'students']);?>">Ученики</a>
            </li>

        </ul>
    </div>
    <hr>

    <?if($menu == 'structure'):?>
        <?=$this->render('blocks/structure', [
            'course' => $course,
            'dataProvider' => $dataProvider,
        ]);?>
    <?elseif($menu == 'setting'):?>
        <?=$this->render('blocks/setting', [
            'course' => $course,
        ]);?>
    <?elseif($menu == 'students'):?>
        <?=$this->render('blocks/students', [
            'dataProvider' => $students,
        ]);?>
    <?endif;?>



</div>


