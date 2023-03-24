<?php

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $readonly boolean */
use yii\widgets\ActiveForm;
use yii\helpers\Html;


?>
<section>
    <div class="container-fluid prof-block">
        <?php $form = ActiveForm::begin(); ?>
        <div class="form-group field-settings-phoneList mt-2 row">
            <div class="col-6">
                <?= $form->field($model, 'name')->label('Имя')->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
                <?= $form->field($model, 'middle_name')->label('Отчество')->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'last_name')->label('Фамилия')->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
            </div>
        </div>

        <?if(!$readonly):?>
            <div class="form-group mt-3">
                <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-primary']) ?>
            </div>
        <?endif;?>
        <?php ActiveForm::end(); ?>
    </div>
</section>
