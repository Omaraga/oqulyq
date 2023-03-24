<?php
/* @var $this yii\web\View*/
/* @var $user common\models\User*/
/* @var $kid common\models\Kid */
/* @var $changeDataForm frontend\models\forms\ChangeDataForm*/
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$user = Yii::$app->user->identity;

?>

<div class="container">
    <?=$this->render('_form', ['model' => $model, 'readonly' => true])?>
    <div class="form-group mt-3">
        <a href="/profile/update-user" class="btn btn-primary">Редактировать</a>
        <a href="/profile/create-kid" class="btn btn-primary">Добавить ребенка</a>
    </div>
    <? foreach ($kids as $kid) : ?>
        <?=$this->render('_formKid', ['model' => $kid, 'readonly' => true])?>
        <div class="form-group mt-3">
            <a href="/profile/update-kid?id=<?=$kid->id?>" class="btn btn-primary">Редактировать</a>
            <a href="/profile/delete-kid?id=<?=$kid->id?>" class="btn btn-danger">Удалить ребенка</a>
            <?= Html::a(Yii::t('app', 'Удалить'), ['delete-kid', 'id' => $kid->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Вы действительно хотите удалить?'),
                'method' => 'post',
            ],
            ]) ?>
        </div>
    <? endforeach; ?>
</div>
