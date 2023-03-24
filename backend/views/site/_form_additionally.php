<?php

/* @var $this yii\web\View */
/* @var $model common\models\Settings */
/* @var $readonly boolean */
use yii\widgets\ActiveForm;

?>
<section>
    <?php $form = ActiveForm::begin(); ?>
    <hr>
    <div class="mt-3">
        <div class="row">
            <h4 class="col-12">Слоган на банере</h4>
            <?= $form->field($model, 'main_banner', ['options' => ['class' => 'col-6 mt-2']])->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
        </div>
        <hr>

        <div class="row">
            <h4 class="col-12">Блок о нас</h4>
            <?= $form->field($model, 'about_us', ['options' => ['class' => 'col-6 mt-2']])->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
        </div>
        <hr>

        <div class="row">
            <h4 class="col-12">Преимущества</h4>
            <?= $form->field($model, 'benefits', ['options' => ['class' => 'col-6 mt-2']])->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
            <h5 class="col-12">Карточки</h5>
            <?= $form->field($model, 'benefits_1', ['options' => ['class' => 'col-6 mt-2']])->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
            <?= $form->field($model, 'benefits_2', ['options' => ['class' => 'col-6 mt-2']])->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
            <?= $form->field($model, 'benefits_3', ['options' => ['class' => 'col-6 mt-2']])->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
        </div>
        <hr>

        <div class="row">
            <h4 class="col-12">Кому может пригодиться</h4>
            <?= $form->field($model, 'for_who_name_1', ['options' => ['class' => 'col-6 mt-2']])->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
            <?= $form->field($model, 'for_who_text_1', ['options' => ['class' => 'col-6 mt-2']])->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
            <?= $form->field($model, 'for_who_name_2', ['options' => ['class' => 'col-6 mt-2']])->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
            <?= $form->field($model, 'for_who_text_2', ['options' => ['class' => 'col-6 mt-2']])->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
            <?= $form->field($model, 'for_who_name_3', ['options' => ['class' => 'col-6 mt-2']])->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
            <?= $form->field($model, 'for_who_text_3', ['options' => ['class' => 'col-6 mt-2']])->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>

        </div>
        <hr>

        <div class="row">
            <h4 class="col-12">Как это работает</h4>
            <?= $form->field($model, 'how_it_1', ['options' => ['class' => 'col-6 mt-2']])->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
            <?= $form->field($model, 'how_it_2', ['options' => ['class' => 'col-6 mt-2']])->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
            <?= $form->field($model, 'how_it_3', ['options' => ['class' => 'col-6 mt-2']])->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
            <?= $form->field($model, 'how_it_4', ['options' => ['class' => 'col-6 mt-2']])->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
            <?= $form->field($model, 'how_it_5', ['options' => ['class' => 'col-6 mt-2']])->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
            <?= $form->field($model, 'how_it_6', ['options' => ['class' => 'col-6 mt-2']])->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>

        </div>
        <hr>

        <div class="row">
            <h4 class="col-12">Подвал сайта</h4>
            <?= $form->field($model, 'footer_banner', ['options' => ['class' => 'col-6 mt-2']])->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
            <?= $form->field($model, 'footer_slag', ['options' => ['class' => 'col-6 mt-2']])->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
        </div>
        <hr>

    </div>

    <?if(!$readonly):?>
        <div class="form-group mt-3">
            <?= \yii\bootstrap4\Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?endif;?>
    <?php ActiveForm::end(); ?>
</section>
