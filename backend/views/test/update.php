<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Test */

$this->title = Yii::t('app', 'Редактировать {modelLabel}: {name}', [
    'name' => $model->question,
    'modelLabel' => Yii::$app->controller->modelLabel
]);
$this->params['breadcrumbs'][] = ['label' => Yii::$app->controller->modelLabel, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->question, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Редактировать');
?>
<div class="news-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
