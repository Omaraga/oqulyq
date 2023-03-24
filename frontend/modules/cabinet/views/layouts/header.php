<?php
$user = \common\models\User::find()->where(['id'=>Yii::$app->user->identity->id])->one();

?>

<header>
    <div class="header">
        <ul class="header-nav mobile-hidden">
            <li class="header-nav__item active"><a href="/" class="header-nav__link">
                    <p>Главная</p>
                </a></li>
            <li class="header-nav__item"><a href="/cabinet/default/about" class="header-nav__link">
                    <p>О нас</p>
                </a></li>
            <li class="header-nav__item"><a href="/cabinet/course" class="header-nav__link">
                    <p>Курсы</p>
                </a></li>
            <li class="header-nav__item"><a href="/news" class="header-nav__link">
                    <p>Новости</p>
                </a></li>
            <li class="header-nav__item"><a href="/site/partners" class="header-nav__link">
                    <p>Партнеры</p>
                </a></li>
        </ul>
        <img src="/img/logo.png" alt="" class="mobil-visible-block decstop-hidden">
        <div class="header-block">
<!--            <img src="/img/course/bell.jpg" alt="" class="header-message">-->
            <a href="/cabinet" class="d-none d-md-block ml-4"><?=$user->getShortFio()?></a>
<!--            <a href=""><img src="/img/course/image-header.jpg" alt="" class="ml-4"></a>-->
            <div class="circle-st header-circle" style="background: green; height: 30px;width: 30px; text-align: center; font-size: 18px; border-radius: 50px;margin-left: 10px">
                <span class="user-avatar"><?= $user ? $user->getShortName():''?></span>
            </div>
        </div>
    </div>
</header>

<ul class="course-sidebar mobile-hidden">
    <li class="course-sidebar__item-title"><a href=""><img class="logo-mini" src="/img/course/logo-mini.svg" alt=""> <img class="logo-sidebar" src="/img/course/logo.svg" alt=""></a></li>
    <li><a href="/cabinet" class="course-sidebar__item"><img src="/img/course/home-sidebar.svg" alt=""> <span>Главная</span></a></li>
    <li><a href="/cabinet/course" class="course-sidebar__item"><img src="/img/course/film-sidebar.svg" alt=""> <span>Курсы</span></a></li>
    <li><a href="/cabinet/profile" class="course-sidebar__item"><img src="/img/course/user-sidebar.svg" alt=""> <span>Личный кабинет</span></a></li>
<!--    <li><a href="#" class="course-sidebar__item"><img src="/img/course/credit-sidebar.svg" alt=""> <span>покупка и оплата</span></a></li>-->
    <li><a href="/cabinet/user" class="course-sidebar__item"><img src="/img/course/settings-sidebar.svg" alt=""> <span>Настройки</span></a></li>
</ul>


<ul class="nav-mobile mobil-visible-flex">
    <li class="nav-mobile__item"><a href="/cabinet" class="nav-mobile__link">
            <img src="/img/course/home-sidebar.svg" alt="">
            <p>Главная</p>
        </a></li>
    <li class="nav-mobile__item"><a href="/cabinet/course" class="nav-mobile__link">
            <img src="/img/course/film-sidebar.svg" alt="">
            <p>Курсы</p>
        </a></li>
    <li class="nav-mobile__item"><a href="/cabinet/profile" class="nav-mobile__link">
            <img src="/img/course/user-sidebar.svg" alt="">
            <p>Кабинет</p>
        </a></li>
<!--    <li class="nav-mobile__item"><a href="" class="nav-mobile__link">-->
<!--            <img src="/img/course/credit-sidebar.svg" alt="">-->
<!--            <p>Покупка</p>-->
<!--        </a></li>-->
    <li class="nav-mobile__item"><a href="/cabinet/user" class="nav-mobile__link">
            <img src="/img/course/settings-sidebar.svg" alt="">
            <p>Настройки</p>
        </a></li>
</ul>