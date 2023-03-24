<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Course */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Курсы'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="course-view">

    <p>
        <?= Html::a(Yii::t('app', 'Настройки'),'/course/settings?id='.$model['id'], ['class' => 'btn btn-primary']); ?>
        <?= Html::a(Yii::t('app', 'Редактировать'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Удалить'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Вы действительно хотите удалить?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'description',
            'requirements',
            'what_learn',
            [
                'attribute' => 'status',
                'value' => function($data){
                    return \common\models\Course::getStatusList()[$data->status];
                }
            ],
            [
                'attribute' => 'level',
                'value' => function($data){
                    return \common\models\Course::getLevelList()[$data->level];
                }
            ],
            [
                'attribute' => 'price',
                'value' => function($data){
                    if ($data->price){
                        return $data->price . ' ' .'тенге';
                    }else{
                        return '';
                    }
                }
            ],
        ],
    ]) ?>
    <img style="width: 100%;" src="<?=\backend\models\BackendHelper::getUrl().$model->preview;?>">
</div>
