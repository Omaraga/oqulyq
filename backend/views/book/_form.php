<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model \common\models\Dictionary */
/* @var $form yii\widgets\ActiveForm */

?>
<div class="news-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <?=$form->field($model, 'name', ['options' => ['class' => 'col-6']])->textInput();?>
        <?=$form->field($model, 'url', ['options' => ['class' => 'col-6']])->textInput();?>
    </div>
    <?= $form->field($model, 'file')->fileInput() ?>


    <div class="form-group mt-4">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
