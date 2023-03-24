<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\News */
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

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <div class="form-group field-news-content">
        <label for="news-content">Содержание:</label>
        <textarea textareatype="ckeditor" cktype="inline" class="form-control" id="news-content" name="News[content]" rows="6" ><?=$model->content?></textarea>
        <div class="help-block"></div>
    </div>

    <?= $form->field($model, 'status')->dropDownList(\common\models\News::getStatusList()) ?>



    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
