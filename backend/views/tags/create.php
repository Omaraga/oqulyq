<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Tags */

$this->title = 'Добавить тег';
$this->params['breadcrumbs'][] = ['label' => 'Тег', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tags-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
