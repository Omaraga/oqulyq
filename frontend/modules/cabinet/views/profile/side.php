<?php
$user = \common\models\User::findOne(Yii::$app->user->identity['id']);


?>

<div class="card-shadow prof-card">
    <img class="img-prof" src="/img/course/user-img.jpg" alt="">
    <p class="card-title"><?=$user->getShortFio()?></p>
<!--    <p class="card-subTitle">Мама 2 детей</p>-->
</div>