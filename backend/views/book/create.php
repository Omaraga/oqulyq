<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\News */

$this->title = Yii::t('app', 'Создать {modelLabel}', ['modelLabel' => Yii::$app->controller->modelLabel]);
$this->params['breadcrumbs'][] = ['label' => Yii::$app->controller->modelLabel, 'url' => ['index', 'id' => Yii::$app->request->get('id')]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
