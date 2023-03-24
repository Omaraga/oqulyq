<?php
/* @var $this yii\web\View */
/* @var $model common\models\Module */
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
$this->title = 'Редактирование модуля #'.$model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Курсы'), 'url' => ['/course']];
$this->params['breadcrumbs'][] = ['label' => $model->course->title, 'url' => ['/course/settings?id='.$model->course_id]];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['/course/module?id='.$model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="module-update">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'title')->textInput()->label('Название модуля  *') ?>
    <div class="form-group mt-3">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
