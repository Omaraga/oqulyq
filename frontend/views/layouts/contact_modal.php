<?php
/* @var $this \yii\web\View */
use frontend\models\ContactForm;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\captcha\Captcha;

$model = new ContactForm;
$js = <<<JS
    $('#contactform-phone').inputmask('+9(999)999-99-99',{placeholder:'+_(___)___-__-__'})
JS;
$this->registerJs($js);

?>
<style>
    .modal-dialog {
        max-width: 800px;
        margin: 1.75rem auto;
    }
    /*Header Omar*/
    #contact-me .modal-header{
        border: none;
    }
    #contact-me .modal-body{
        padding: 10px 60px;
        color: #000000;
    }
    #contact-me .button-main{
        padding: 10px 30px;
        width: 100%;
        background-color: #5EAC52;
        color: white;
        font-weight: bold;
    }
</style>
<!-- Modal -->
<div class="modal fade" id="contact-me" tabindex="-1" aria-labelledby="contact-meLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5">
                        <div class="col-12 mb-2">
                            <img src="/img/logo.png" alt="Bass Technology серый логотип" width="134" height="40">
                        </div>
                        <div class="col-12">
                            <h3 style="size: 25px; ;font-weight: bold;">Записаться на предзаказ</h3>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <?php $form = ActiveForm::begin(['options' => ['class' => 'row mt-2', 'id' => 'form-contact-me'], 'action' => '/site/contact']); ?>


                        <?= $form->field($model, 'name', ['options' =>['class'=>'col-12 mb-1 col-md-6']])->textInput() ?>
                        <?= $form->field($model, 'last_name', ['options' =>['class'=>'col-12 mb-1 col-md-6']])->textInput() ?>
                        <?= $form->field($model, 'phone',['options' =>['class'=>'col-12 mb-1']])->textInput() ?>
                        <!--                --><?//= $form->field($model, 'verifyCode', ['options' =>['class'=>'col-12 mb-1 mt-1']])->widget(Captcha::className(), [
                        //                    'template' => '<div class="row"><div class="col-4">{image}</div><div class="col-6 offset-1">{input}</div></div>',
                        //                ])->label(false) ?>
                        <div class="form-group col-12 mt-2 pb-4">
                            <?= Html::submitButton(Yii::t('app', 'Записаться'), ['class' => 'btn bg-green full-img']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
