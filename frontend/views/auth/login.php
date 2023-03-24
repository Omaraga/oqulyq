<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */

/* @var $model \common\models\LoginForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = Yii::t('app', 'Авторизация');
?>
<div class="register">

    <div class="register-content" style="margin-bottom: 100px;">
        <p class="register-title"><?=Yii::t('main', 'Авторизация');?></p>
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
        <?= $form->field($model, 'email')->textInput(['class' => 'register-input', 'autofocus' => true, 'placeholder' => Yii::t('main', 'E-mail')])->label(false) ?>
        <?= $form->field($model, 'password')->passwordInput(['class' => 'register-input', 'placeholder' => Yii::t('main', 'Пароль')])->label(false) ?>
        <?= $form->field($model, 'rememberMe')->checkbox() ?>
        <div class="form-group">
            <?= Html::submitButton(Yii::t('main', 'Войти'), ['class' => 'register-button', 'name' => 'signup-button']) ?>
        </div>
        <div class="register-link">
            <a href="/auth/signup"><?=Yii::t('main', 'Еще не зарегистрировались?');?> <span><?=Yii::t('main', 'Зарегистрироваться');?></span></a>
            <br>
            <?= \yii\helpers\Html::a(Yii::t('main', 'Забыли пароль?'), '/auth/request-password-reset')?>
            <a href="/">На главную</a>
        </div>
        <div>

        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

