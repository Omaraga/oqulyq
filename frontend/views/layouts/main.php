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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500;600;700&family=Kanit&family=Lato:wght@400;900&family=Merriweather:wght@300&family=Montserrat:wght@400;500;600;700&family=Noto+Sans+SC:wght@400;500;700&family=Rubik:wght@300;700;800&display=swap" rel="stylesheet">
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
<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage();
