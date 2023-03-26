<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model \common\models\Test */
/* @var $form yii\widgets\ActiveForm */

?>
<div class="news-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?=$form->field($model, 'question')->textarea();?>
    <?=$form->field($model, 'right_answer')->textInput();?>
    <div class="row">
        <?=$form->field($model, 'wrong_answer_1', ['options' => ['class' => 'col-6']])->textInput();?>
        <?=$form->field($model, 'wrong_answer_2', ['options' => ['class' => 'col-6']])->textInput();?>
        <?=$form->field($model, 'wrong_answer_3', ['options' => ['class' => 'col-6']])->textInput();?>
    </div>
    <div class="row my-3">
        <?=$form->field($model, 'lesson_id', ['options' => ['class' => 'col-6']])->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Lesson::find()->all(), 'id', 'title'));?>
    </div>


    <div class="form-group mt-4">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
