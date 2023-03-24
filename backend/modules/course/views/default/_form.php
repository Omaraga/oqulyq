<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Course */
/* @var $form yii\widgets\ActiveForm */
/* @var $actionUrl string | null */

$js = <<<JS
    $('#course-type').change(function (e){
        let type = $(this).val();
        if (type == 1){
            $('.field-course-price').css({'display':'block'});
        }else{
            $('.field-course-price').css({'display':'none'});
        }
        
    });
    if ($('#course-type').val() == 1){
        $('.field-course-price').css({'display':'block'});
    }else{
            $('.field-course-price').css({'display':'none'});
        }
    $("#course-price").mask('99999999.99');
    $('.course-form').find("textarea[textareatype='ckeditor']").each(function() {
    CKEDITOR.inline($(this)[0], {
        customConfig: 'config.js'
    });
});
JS;
$this->registerJs($js);

$actionUrl = isset($actionUrl) ? $actionUrl :'';

?>

<div class="course-form">

    <?php $form = ActiveForm::begin([
        'action' => $actionUrl,
    ]); ?>
        <div class="row">
            <?= $form->field($model, 'title',['options' => ['class' => 'col-12']])->textInput()->label('Название курса  *') ?>

        </div>
        <div class="row mt-2">
            <?= $form->field($model, 'type', ['options' => ['class' => 'col-6']])->dropDownList(\common\models\Course::getTypes())->label('Платный или бесплатный  *');?>
            <?= $form->field($model, 'price',['options' => ['class' => 'col-6']])->textInput(); ?>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <?if($model->preview):?>
                        <img src="<?=Yii::$app->params['url'];?><?=$model->preview;?>" alt="" class="col-4">
                    <?endif;?>
                    <?=$form->field($model, 'previewFile', ['options' => ['class' => 'col-8 form-control-file']])->fileInput();?>;
                </div>
            </div>

        </div>
        <div class="row mt-3">
            <div class="form-group field-course-description col-12">
                <label for="course-description"><?=$model->getAttributeLabel('description');?></label>
                <textarea textareatype="ckeditor" cktype="inline" class="form-control" id="course-description" name="Course[description]" rows="6" ><?=$model->description?></textarea>
                <div class="help-block"></div>
            </div>
        </div>
        <hr>
        <div class="row mt-2">
            <div class="form-group field-course-what_learn col-12">
                <label for="course-what_learn"><?=$model->getAttributeLabel('what_learn');?></label>
                <textarea textareatype="ckeditor" cktype="inline" class="form-control" id="course-what_learn" name="Course[what_learn]" rows="6" ><?=$model->what_learn?></textarea>
                <div class="help-block"></div>
            </div>
        </div>
        <hr>
        <div class="row mt-2">
            <div class="form-group field-course-requirements col-12">
                <label for="course-requirements"><?=$model->getAttributeLabel('requirements');?></label>
                <textarea textareatype="ckeditor" cktype="inline" class="form-control" id="course-requirements" name="Course[requirements]" rows="6" ><?=$model->requirements?></textarea>
                <div class="help-block"></div>
            </div>
        </div>

        <div class="row mt-2">
            <?= $form->field($model, 'level', ['options' => ['class' => 'col-6']])->dropDownList(\common\models\Course::getLevelList())->label('Уровень сложности курса  *');?>
        </div>

        <div class="row">
            <?= $form->field($model, 'status', ['options' => ['class' => 'col-6']])->dropDownList(\common\models\Course::getStatuses())->label('Статус курса  *');?>
        </div>
        <div class="form-group mt-3">
            <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>



</div>
