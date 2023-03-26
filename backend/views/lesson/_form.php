<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model \common\models\Dictionary */
/* @var $form yii\widgets\ActiveForm */

$js = <<<JS
$('.news-form').find("textarea[textareatype='ckeditor']").each(function() {
    CKEDITOR.inline($(this)[0], {
        customConfig: 'config.js'
    });
});


JS;
$this->registerJs($js);
?>
<div class="news-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?=$form->field($model, 'title')->textInput();?>
    <div class="form-group field-lesson-content">
        <label for="lesson-content">Содержание:</label>
        <textarea textareatype="ckeditor" cktype="inline" class="form-control" id="lesson-content" name="Lesson[content]" rows="6" ><?=$model->content?></textarea>
        <div class="help-block"></div>
    </div>


    <div class="form-group mt-4">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
