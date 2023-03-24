<?php
/* @var $this yii\web\View */
/* @var $course \common\models\Course */

?>

<div class="course-update">

    <?= $this->render('/default/_form', [
        'model' => $course,
        'actionUrl' => \yii\helpers\Url::to(['/course/default/update', 'id' => $course->id]),
    ]) ?>

</div>
