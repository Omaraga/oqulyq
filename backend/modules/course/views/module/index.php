<?php
/* @var $this yii\web\View */
/* @var $module common\models\Module */
/* @var $dataProvider yii\data\ActiveDataProvider */
use yii\widgets\Pjax;

$this->title = $module->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Курсы'), 'url' => ['/course']];
$this->params['breadcrumbs'][] = ['label' => $module->course->title, 'url' => ['/course/settings?id='.$module->course_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="module">
    <?= \yii\widgets\DetailView::widget([
        'model' => $module,
        'attributes' => [
            'id',
            'title'
        ],
    ]) ?>
    <?=\yii\helpers\Html::a('Редактировать модуль', ['/course/module/update', 'id' => $module->id], ['class' => 'btn btn-success']);?>
    <?=\yii\helpers\Html::a('Удалить модуль', ['/course/module/delete', 'id' => $module->id], ['class' => 'btn btn-danger', 'onclick' => "return confirm('Вы действительно хотите удалить модуль?')"]);?>
    <hr>

    <?=\yii\helpers\Html::a('Создать урок',['/course/lesson/create', 'module_id' => $module->id], ['class' => 'btn btn-primary mb-3', 'id' => 'create-lesson']);?>

    <?php Pjax::begin(['id' => 'lessons']) ?>
    <?= \richardfan\sortable\SortableGridView::widget([
        'dataProvider' => $dataProvider,
        'sortUrl' => \yii\helpers\Url::to(['sortItem']),
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'contentOptions' => ['width' => '10%', 'style' => 'vertical-align: middle;font-size: 15px;', 'class' => 'text-center'],
            ],
            [
                'attribute'=>'title',
                'contentOptions' => ['class' => 'text-left', 'width' => '60%', 'style' => 'padding-left: 10px; vertical-align: middle;'],
                'content'=>function($data){
                    return \yii\helpers\Html::a($data['title'],'/course/lesson?id='.$data['id'],['style' => 'font-size: 15px;color: purple;font-weight: bold;text-decoration: none;']);
                },
                'format' => 'raw'
            ],
            [
                'attribute' => 'type',
                'contentOptions' => ['class' => 'text-left', 'width' => '10%', 'style' => 'padding-left: 10px; vertical-align: middle;'],
                'content' => function($data){
                    return \common\models\Lesson::getTypes()[$data->type];
                }
            ],
            [
                'label' => 'Действия',
                'contentOptions' => ['class' => 'text-center', 'width' => '20%', 'style' => 'vertical-align: middle;'],
                'content' => function($data){
                    return \yii\helpers\Html::a('<i class="fa fa-eye" aria-hidden="true"></i>',['/course/lesson', 'id' => $data->id],['class' => 'btn btn-primary mb-3 ml-1']).
                        \yii\helpers\Html::a('<i class="fa fa-trash" aria-hidden="true"></i>', ['/course/lesson/delete', 'id' => $data->id], ['class' => 'btn btn-danger mb-3 ml-1', 'onclick' => "return confirm('Вы действительно хотите удалить урок?')"]);
                },
                'format' => 'raw',
            ]


        ],
    ]); ?>
    <?php yii\widgets\Pjax::end(); ?>
</div>
