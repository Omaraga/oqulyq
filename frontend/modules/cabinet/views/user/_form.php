<?php

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $readonly boolean */
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use common\models\Country;
use yii\helpers\Url;

?>
<section>
    <div class="container-fluid">
        <div class="mb-3">
            <?= Html::a(Yii::t('app', 'Основные'), ['/cabinet/user/'], ['class' => 'btn bg-green']) ?>
            <?= Html::a(Yii::t('app', 'Информация о детях'), ['/cabinet/kid/'], ['class' => 'btn bg-green']) ?>
            <?= Html::a(Yii::t('app', 'Безопасность'), ['/cabinet/user/security'], ['class' => 'btn bg-green']) ?>
        </div>
        <?php $form = ActiveForm::begin() ?>
            <div class="form-group field-settings-phoneList prof-block mt-2">
                <div class="row">
                    <div class="col-6">
                        <p class="page-subTitle mb-3">Общие данные</p>
                        <?= $form->field($model, 'first_name')->label('Имя')->textInput(['maxlength' => true, 'disabled' => true]) ?>
                        <?= $form->field($model, 'last_name')->label('Фамилия')->textInput(['maxlength' => true, 'disabled' => true]) ?>
                        <?= $form->field($model, 'middle_name')->label('Отчество')->textInput(['maxlength' => true, 'disabled' => true]) ?>
                        <?= $form->field($model, 'phone')->label('Номер телефона')->textInput(['maxlength' => true, 'disabled' => true]) ?>
                        <?= $form->field($model, 'birthday')->label('День рождения')->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
                        <?= $form->field($model, 'family_id')->label('Семейное положение')->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>

                        <p class="page-subTitle mt-5 mb-3">Медицинские данные</p>
                        <?= $form->field($model, 'height')->label('Рост')->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
                        <?= $form->field($model, 'chronic')->label('Хронические заболевания')->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
                        <?= $form->field($model, 'social')->label('Социальные сети')->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
                        <?= $form->field($model, 'about')->label('О себе')->textarea()->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
                    </div>
                    <div class="col-6">
                        <p class="page-subTitle mb-3">Статус</p>
                        <?= $form->field($model, 'country_id')->label('Страна')->dropDownList(ArrayHelper::map(Country::find()->all(),'id','name'),
                            [
                                'prompt'=>'Выберите',
                                'onchange'=>'
                                    $.get( "'.Url::toRoute('/cabinet/user/lists-region').'", { id: $(this).val() } )
                                    .done(function( data ) {
                                    $( "#'.Html::getInputId($model, 'region_id').'" ).html( data );
                                }
                                );',
//                                'disable' => 'yes',
                                'disabled' => $readonly
                            ]);?>
                        <?= $form->field($model, 'region_id')->label('Область')->dropDownList(ArrayHelper::map(\common\models\Region::find()->all(),'id','name'),
                            [
                                'prompt'=>'Выберите',
                                'onchange'=>'
                                    $.get( "'.Url::toRoute('/cabinet/user/lists-city').'", { id: $(this).val() } )
                                    .done(function( data ) {
                                    $( "#'.Html::getInputId($model, 'city_id').'" ).html( data );
                                }
                                );',
                                'disabled' => $readonly,
                            ]);?>
                        <?= $form->field($model, 'city_id')->label('Город')->dropDownList(ArrayHelper::map(\common\models\City::find()->all(),'id','name'), ['prompt'=>'Выберите','disabled' => $readonly]);?>
                        <?= $form->field($model, 'email')->label('Почта')->textInput(['maxlength' => true, 'disabled' => true]) ?>
                        <?= $form->field($model, 'education_id')->label('Образование')->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
                        <?= $form->field($model, 'weight')->label('Вес')->textInput(['maxlength' => true, 'disabled' => $readonly])?>
                        <?= $form->field($model, 'height')->label('Рост')->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
                        <?= $form->field($model, 'chronic')->label('Хронические заболевания')->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
                        <?= $form->field($model, 'social')->label('Социальные сети')->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>
                        <?= $form->field($model, 'about')->label('О себе')->textarea()->textInput(['maxlength' => true, 'disabled' => $readonly]) ?>

                    </div>
                </div>

            </div>

            <?if(!$readonly):?>
                <div class="form-group mt-3">
                    <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn bg-green']) ?>
                </div>
            <?endif;?>
            <?php ActiveForm::end(); ?>
    </div>
</section>
