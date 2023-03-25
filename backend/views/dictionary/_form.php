<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model \common\models\Dictionary */
/* @var $form yii\widgets\ActiveForm */

if (!$model->type){
    $model->type = Yii::$app->request->get('type') ? : \common\models\Dictionary::TYPE_WORD;
}
?>
<div class="news-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <?=$form->field($model, 'ru', ['options' => ['class' => 'col-6']])->textInput();?>
        <?=$form->field($model, 'kz', ['options' => ['class' => 'col-6']])->textInput();?>
    </div>
    <div class="row my-3">
        <?=$form->field($model, 'type')->hiddenInput()->label(false);?>
        <?=$form->field($model, 'lesson_id', ['options' => ['class' => 'col-6']])->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Lesson::find()->all(), 'id', 'title'));?>
    </div>


    <div class="form-group mt-4">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
