<?php

/* @var $this yii\web\View */
/* @var $model common\models\Settings */

use yii\widgets\ActiveForm;
$this->title = 'Основные данные о компании';
?>

<?=$this->render('_form_additionally', ['model' => $model, 'readonly' => true])?>

<div class="form-group mt-3">
    <a href="/site/update-content" class="btn btn-danger">Редактировать</a>
</div>


