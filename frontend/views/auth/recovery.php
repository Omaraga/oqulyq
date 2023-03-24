<?php
/**
 * @var $model frontend\models\PasswordResetRequestForm
 * @var $form yii\bootstrap\ActiveForm
 */
use yii\bootstrap\ActiveForm;

$this->title='Құпия сөзді еске түсіру';

?>
<div class="register">

    <div class="register-block register-fon" style="margin-bottom: 100px;">
        <div class="register-block-title">
            <h2 class="w6">Құпия сөзді еске түсіру</h2>
        </div>
        <div class="register-img">
            <img class="img-sign" src="/img/register-img.svg" alt="">
        </div>
        <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
            <?= $form->field($model, 'email')->textInput(['class' => 'input', 'autofocus' => true, 'placeholder' => 'Почта'])->label(false) ?>
            <button class="mt-5 mb-3">Жіберу</button>

        <?php ActiveForm::end(); ?>
    </div>
</div>


