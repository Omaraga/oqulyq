
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Редактирование';
$this->params['breadcrumbs'][] = $this->title;
?>
<main class="main-course">
    <div class="container-fliud">
        <div class="row">
            <div class="col-9">
                <?=$this->render('_form', ['model' => $model, 'readonly' => false])?>
            </div>

            <div class="col-3">
                <?=$this->render('@app/modules/cabinet/views/user/side.php')?>
            </div>
        </div>
    </div>
</main>
