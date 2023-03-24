<?php
/* @var $this yii\web\View */
/* @var $model common\models\Lesson */
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
$this->title = 'Редактирование урока #'.$model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Курсы'), 'url' => ['/course']];
$this->params['breadcrumbs'][] = ['label' => $model->course->title, 'url' => ['/course/settings?id='.$model->course_id]];
$this->params['breadcrumbs'][] = ['label' => $model->module->title, 'url' => ['/course/module?id='.$model->module_id]];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['/course/lesson?id='.$model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lesson-update">
    <?=$this->render('_form', ['model' => $model]);?>
</div>
