<?php
$this->title = 'Техникалық қолдау';

?>

<style>
    .form-select {
        display: block;
        width: 100%;
        padding: 0.375rem 2.25rem 0.375rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        background-color: #fff;
        background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e);
        background-repeat: no-repeat;
        background-position: right 0.75rem center;
        background-size: 16px 12px;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }
</style>
<main>

    <div class="box__right col-lg-6 col-md-12 col-12">
        <div class="tab-content right-tab" id="pills-tabContent">
            <div class="tab-pane show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="block__right">
                    <div class="row">
                        <h2 class="h2">Қолдау қызметіне жаңа сұраныс</h2>
                        <?php $form = \yii\widgets\ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                        <div class="block-form">
                            <div class="item">
                                <div class="form-box">
                                    <h6 class="w7">Тақырыбы</h6>
                                    <?= $form->field($ticketForm, 'title')->textInput(['placeholder'=>'Тақырыбы'])->label(false) ?>
                                </div>
                                <div class="form-box">
                                    <h6 class="w7">Бөлім</h6>
                                    <?= $form->field($ticketForm, 'category',['options'=>['class'=>'mb-3']])->dropDownList($categories,[
                                        'prompt' => 'Санатты таңдаңыз',
                                        'class'=>'form-select',
                                        'id'=>'selectCategory',
                                    ])->label(false); ?>
                                </div>
                                <div class="form-box">
                                    <h6 class="w7">Хабарлама</h6>
                                    <?= $form->field($ticketForm, 'text')->textarea(['class'=>'form-control', 'id'=>'floatingTextarea'])->label(false); ?>
                                </div>
                                <div class="form-box">
                                    <h6 class="w7">Файл</h6>
                                    <?= $form->field($ticketForm, 'file')->fileInput(['style'=>'visibility: hidden;', 'id'=>'uploaded'])->label(false);?>
                                    <label class="btn logic-bottom-button" for="uploaded">Файл таңдау</label>
                                </div>
                            </div>

                            <div class="change_buttons">
                                <button class="btn logic-bottom-button" type="submit" >Сақтау</button>
                            </div>
                        </div>

                        <?php \yii\widgets\ActiveForm::end(); ?>


                    </div>
                </div>
            </div>
        </div>
    </div>

</main>