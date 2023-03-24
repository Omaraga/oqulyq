<?php
use common\models\User;
use yii\helpers\Html;
/* @var $this yii\web\View */
$user = User::findOne(Yii::$app->user->identity['id']);

$this->title = '';
?>
<style>
    .test-class{
        position: absolute;
        width: 817px;
        height: 105px;
        left: 20%;
        top: 499px;

        font-family: 'Gilroy';
        font-style: normal;
        font-weight: 600;
        font-size: 25px;
        line-height: 140%;
        /* or 35px */

        text-align: center;
        letter-spacing: 0.03em;

        color: rgba(255, 255, 255, 0.8);
    }
</style>

<p class="test-class">Специалистами была разработана и  успешно внедрена  система управления электронной очередью NOMAD.   NOMAD SYSTEM станет вашим главным помощником. </p>