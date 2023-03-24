<?php

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $readonly boolean */
use yii\widgets\ActiveForm;
use yii\helpers\Html;


?>
<section>
    <?php $form = ActiveForm::begin(); ?>
    <div class="form-group field-settings-phoneList mt-2">
        <?= $form->field($model, 'first_name')->label('Имя')->textInput(['maxlength' => true, 'disabled' => true]) ?>
        <?= $form->field($model, 'middle_name')->label('Отчество')->textInput(['maxlength' => true, 'disabled' => true]) ?>
        <?= $form->field($model, 'last_name')->label('Фамилия')->textInput(['maxlength' => true, 'disabled' => true]) ?>
        <?= $form->field($model, 'phone')->label('Номер телефона')->textInput(['maxlength' => true, 'disabled' => true]) ?>
        <?= $form->field($model, 'email')->label('Почта')->textInput(['maxlength' => true, 'disabled' => true]) ?>
        <?= $form->field($model, 'nationality_id')->label('Страна')->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
        <?= $form->field($model, 'city_id')->label('Город')->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
        <?= $form->field($model, 'education_id')->label('Образование')->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
        <?= $form->field($model, 'birthday')->label('День рождения')->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
        <?= $form->field($model, 'weight')->label('Вес')->textInput(['maxlength' => true, 'disabled' => $readonly])?>
        <?= $form->field($model, 'height')->label('Рост')->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
        <?= $form->field($model, 'chronic')->label('Хронические заболевания')->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
        <?= $form->field($model, 'family_id')->label('Семейное положение')->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
        <?= $form->field($model, 'social')->label('Социальные сети')->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
        <?= $form->field($model, 'about')->label('О себе')->textarea()->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
    </div>

    <?if(!$readonly):?>
        <div class="form-group mt-3">
            <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?endif;?>
    <?php ActiveForm::end(); ?>
</section>
