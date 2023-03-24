<?php

/* @var $this yii\web\View */
/* @var $model common\models\Settings */

use yii\widgets\ActiveForm;

$this->title = 'Редактирование';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
<?=$this->render('_form', ['model' => $model, 'readonly' => false])?>
</div>
