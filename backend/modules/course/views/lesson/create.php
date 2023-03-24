<?php
/* @var $this yii\web\View */
/* @var $model common\models\Lesson */
/* @var $module common\models\Module */
$this->title = 'Создание урока';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Курсы'), 'url' => ['/course']];
$this->params['breadcrumbs'][] = ['label' => $module->course->title, 'url' => ['/course/settings?id='.$module->course_id]];
$this->params['breadcrumbs'][] = ['label' => $module->title, 'url' => ['/course/module?id='.$module->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lesson-create">
    <?=$this->render('_form', ['model' => $model]);?>
</div>
