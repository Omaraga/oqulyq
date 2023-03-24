<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="/css/cabinet.css">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <script src="https://kit.fontawesome.com/baa51cad6c.js" crossorigin="anonymous"></script>
    <?php $this->head() ?>
    <link rel="stylesheet" href="/css/app.css">

</head>
<body>

<?php $this->beginBody() ?>
    <?php echo $this->render('header'); ?>
    <?= Alert::widget() ?>
    <div >
        <?= $content ?>
    </div>
    <?php echo $this->render('footer'); ?>
<?php $this->endBody() ?>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
</body>
</html>
<?php $this->endPage();
