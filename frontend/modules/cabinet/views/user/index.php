<?php
use yii\helpers\Html;
?>

<main class="main-course">
    <div class="container-fliud">
        <div class="row">
            <div class="col-9">
                <?=$this->render('_form', ['model' => $model, 'readonly' => true])?>
                <div class="form-group mt-3">
                    <?= Html::a(Yii::t('app', 'Редактировать'), ['update'], ['class' => 'btn bg-green']) ?>
                </div>
            </div>

            <div class="col-3">
                <?=$this->render('@app/modules/cabinet/views/user/side.php')?>
            </div>
        </div>
    </div>
</main>