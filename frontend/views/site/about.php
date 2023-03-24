<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'О нас';
$this->params['breadcrumbs'][] = $this->title;
?>

<main>
    <section class="about-section mt-5">
        <div class="main-container">
            <div class="row">
                <div class="main-title d-block d-lg-none">
                    <p >О нас</p>
                </div>
                <div class="col-12 col-lg-6 d-flex justify-content-end">
                    <img class="about-img" src="/img/landing/about.jpg" alt="">
                </div>
                <div class="col-12 col-lg-6 mt-5 mt-lg-0">
                    <div class="main-title d-none d-lg-block">
                        <p  class="text-left">О нас</p>
                    </div>
                    <div class="about-block">
                        <p class="main-subTitle">Компания Aux Medical Group</p>
                        <p class="my-3 about-text">Международная общеобразовательная онлайн - платформа по получению медицинских знаний, а именно по предоставлению клинических рекомендаций. </p>
                        <p class="about-text">Онлайн платформа предоставляет вам возможность окунуться в мир медицин и получить качественные рекомендации от ведущих медицинских специалистов.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="advantages-section">
        <div class="main-container">
            <div class="advantages">
                <div class="main-title text-center">
                    <p>Преимущества</p>
                </div>
                <div class="title-text">
                    <p>Повысить % медицинской грамотности родителей и создать условия для ухода и развития детей, что позволит построить крепкий фундамент здоровью будущего поколения.</p>
                    <p class="mи-4 txt-view">Компания Aux Medical Group делает медицину доступной, экономной, безопасной и комфортной.</p>
                </div>
                <div class="a-content main-content">
                    <div class="card a-card about-card">
                        <div>
                            <img class="mb-3" src="/img/icon/star-icon.svg" alt="">
                        </div>
                        <p class="about-card-text text-center mb-2">Материал изложен на понятном языке, и без сложных терминов</p>
                        <p class="about-card-text text-center mb-2">Доступ к видео в любое время после покупки</p>
                        <p class="about-card-text text-center mb-2">Недорогая стоимость</p>
                    </div>
                    <div class="card a-card about-card">
                        <div>
                            <img class="mb-3" src="/img/icon/a-heart-icon.svg" alt="">
                        </div>
                        <p class="about-card-text text-center mb-2">Экстренность поиска информации при неотложной помощи – методички / видео  всегда у Вас в доступе</p>
                        <p class="about-card-text text-center mb-2">Записываться на прием к врачу</p>
                    </div>
                    <div class="card a-card about-card">
                        <div>
                            <img class="mb-4" src="/img/icon/info-icon.svg" alt="">
                        </div>
                        <p class="about-card-text text-center mb-2">Главная наша ценность – гарантия качество  информации:</p>
                        <p class="about-card-text text-center mb-2">Основана на доказательной медицине </p>
                        <p class="about-card-text text-center mb-2">Проверена практическим опытом врачей и докторов мед. наук</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="clients-section">
        <div class="container">
            <div class="clients">
                <div class="main-title">
                    <p>Кому может пригодиться</p>
                </div>
                <div class="cli-content main-content">
                    <div class="card-border mb-3 toggle">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="card-title f-16">Молодым родителям с ребёнком первого года жизни</p>
                            <img class="toggle-img" src="/img/icon/polus.svg" alt="">
                        </div>
                        <p class="txt-view cli-item__text toggle-text">
                            Вы только стали родителями и трепетно стараетесь ухаживать за ребенком, оберегать его и сильно переживаете, когда что-то идет не так. У Вас возникают нормальные вопросы о здоровье и развитии ребенка.
                            <br>
                            В зависимости от того, как ребенок проживет свой первый год жизни зависит его будущее здоровье. И именно Вы, как родители сможете помочь построить ему здоровое будущее. AuxMed - поможет Вам разобраться в базовых понятиях о питании, уходе, первой помощи вашему малышу.Будьте здоровы вместе с AuxMed.
                        </p>
                    </div>
                    <div class="card-border mb-3 toggle">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="card-title f-16">Беременным женщинам, а также женщинам, планирующим беременность</p>
                            <img class="toggle-img" src="/img/icon/polus.svg" alt="">
                        </div>
                        <p class="txt-view cli-item__text toggle-text">
                            Вы только-только собираетесь становиться мамочками-это очень важное решение для любой женщины.
                            <br>
                            Беременность – не болезнь! Пройдите этот прекрасный период вашей жизни полностью уверенной в собственном здоровье, и здоровье Вашего малыша.
                            <br>
                            Более того, вы заранее можете пройти курсы по уходу за новорожденным малышом, как его кормить и в каких ситуациях обращаться к специалистам.
                            <br>
                            Курсы без медицинских терминов и доступные для понимания. Ведь здоровье вашего малыша прежде всего зависит от Вас. Будьте здоровы вместе с AuxMed.
                        </p>
                    </div>

                    <div class="card-border mb-3 toggle">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="card-title f-16">Родителям с детьми, которые страдают хроническими заболеваниями</p>
                            <img class="toggle-img" src="/img/icon/polus.svg" alt="">
                        </div>
                        <ul class="txt-view cli-item__text toggle-text">
                            <li>
                                Сложно описать, как тяжело справляться с хроническими заболеваниями. Ведь они никуда не отступают, могут возникать в вашей жизни внезапно, мешать вашей нормальной жизнедеятельности. Всегда есть определенные правила что можно, а что нет.
                                <br>
                                Со временем Вы лучше любых врачей знаете как справляться с этой болезнью ведь перечитали много статьей, книг и анализов.
                                <br>
                                Курсы по хроническим заболеваниями подойдут для вас если:
                                <ul class="ml-3">
                                    <li style="list-style: disc;">
                                        Вы только столкнулись с болезнью и хотите больше узнать правильной информации о ней;
                                    </li>
                                    <li style="list-style: disc;">
                                        Вы уже знаете многое, но хотели бы закрепить ваш практический опыт правильной теорией с пояснением от ведущих врачей.
                                    </li>
                                    <li style="list-style: disc;">
                                        Если у Вас ребенок по разным причинам отстает по развитию от сверстников и требует особенного ухода и помощи в развитии.
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>