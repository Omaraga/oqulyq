<?php
/* @var $this yii\web\View */
/* @var $model common\models\Lesson */
/* @var $dataProvider yii\data\ActiveDataProvider */
use common\models\Lesson;
$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Курсы'), 'url' => ['/course']];
$this->params['breadcrumbs'][] = ['label' => $model->course->title, 'url' => ['/course/settings?id='.$model->course_id]];
$this->params['breadcrumbs'][] = ['label' => $model->module->title, 'url' => ['/course/module?id='.$model->module_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="module">
    <?=\yii\helpers\Html::a('Редактировать урок', ['/course/lesson/update', 'id' => $model->id], ['class' => 'btn btn-success']);?>
    <?=\yii\helpers\Html::a('Удалить урок', ['/course/lesson/delete', 'id' => $model->id], ['class' => 'btn btn-danger', 'onclick' => "return confirm('Вы действительно хотите удалить урок?')"]);?>
    <hr>
    <div class="row">
        <div class="col-12">
            <h1 class="text-center"><?=$model->title;?></h1>
        </div>
        <hr>
        <?if($model->type == Lesson::TYPE_TEXT_LESSON):?>
            <div class="col-12 mt-2 mb-2">
                <h3>Прочтите урок (тип урока ТЕКСТ)</h3>
                <p><?=$model->source;?></p>
            </div>
        <?elseif($model->type == Lesson::TYPE_VIDEO_LESSON):?>
            <div class="col-12 mt-2 mb-2">
                <h3>Посмотрите урок (тип урока ВИДЕО)</h3>
                <?=$model->getFrame();?>
            </div>
        <?elseif($model->type == Lesson::TYPE_AUDIO_LESSON):?>
            <div class="col-12 mt-2 mb-2">
                <h3>Послушайте урок (тип урока АУДИО)</h3>
                <audio controls>
                    <source src="<?=$model->source;?>" type="audio/mpeg">
                </audio>
            </div>
        <?endif;?>

        <div class="col-12">
            <h3 >Описание урока</h3>
            <p><?=$model->content;?></p>
        </div>

    </div>

</div>
