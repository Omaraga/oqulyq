<?php
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\UserCourse;

?>

<div class="user-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'formatter' => [

            'class' => '\yii\i18n\Formatter',

            'dateFormat' => 'dd.MM.yyyy',

            'datetimeFormat' => 'dd.MM.yyyy HH:mm::ss',

        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'user_id',
                'value' => function($data){
                    $user = $data->user;
                    if ($user){
                        return $user->getFio();
                    }
                }
            ],
            'ts:datetime',

        ],
    ]); ?>
</div>
