<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Course */
/* @var $form yii\widgets\ActiveForm */
/* @var $actionUrl string | null */

$js = <<<JS

JS;
$this->registerJs($js);

?>

<div class="course-form">

    <?php $form = ActiveForm::begin([]); ?>
        <?= $form->field($model, 'title')->textInput()->label('Название урока  *') ?>
        <?= $form->field($model, 'type')->dropDownList(\common\models\Lesson::getTypes())->label('Вид урока  *');?>
        <?= $form->field($model, 'info')->textInput()->label('Описание урока')?>
        <?= $form->field($model, 'content')->textInput()->label('Ссылка на урок  *')?>
        <div class="form-group mt-3">
            <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>



</div>
