<?php
$settings = \common\models\Settings::find()->one();
?>
<footer>
    <div class="partners-back part-form-size">
        <div class="row">
            <div class="col-12 col-lg-6  mt-5 mt-lg-0">
                <div class="partners-form" action="">
                    <p class="partners-form-title mb-3">Поможем в выборе!</p>
                </div>
            </div>
            <div class="col-12 col-lg-6 mt-5 mt-lg-0 mb-5 mb-lg-0">
                <input type="text" class="form-input mb-3 form-input-size" placeholder="Имя">
                <input type="text" class="form-input mb-3 form-input-size" placeholder="Телефон">
                <input type="text" class="form-input full-img" placeholder="Поле для текста">
                <div class="d-flex align-items-center footer-reverse mt-4">
                    <p class="text-white partners-form-text">Нажимая на кнопку я соглашаюсь на обработку персональных данных</p>
                    <p class="button w-sight__button mt-4 mt-md-0">
                        Отправить
                        <a href=""></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    </section>
    <div class="main-container">
        <div class="footer">
            <div class="f-nav">
                <div class="logo">
                    <a href="/"><img src="/img/icon/footer-logo.svg" alt=""></a>
                </div>
                <ul>
                    <li>
                        <p class="f-nav__title">О нас</p>
                    </li>
                    <li>
                        <p class="f-nav__text"><a href="">Реквизиты</a></p>
                    </li>
                    <li>
                        <p class="f-nav__text"><a href="/site/partners">Партнеры</a></p>
                    </li>
                    <li>
                        <p class="f-nav__text"><a href="">Публикации</a></p>
                    </li>
                </ul>
                <ul>
                    <li>
                        <p class="f-nav__title">Клиентам</p>
                    </li>
                    <li>
                        <p class="f-nav__text"><a href="">Онлайн консультации</a></p>
                    </li>
                    <li>
                        <p class="f-nav__text"><a href="">Вопрос-ответ</a></p>
                    </li>
                    <li>
                        <p class="f-nav__text"><a href="">Отзывы</a></p>
                    </li>
                    <li>
                        <p class="f-nav__text"><a href="">Помощь покупателям</a></p>
                    </li>
                </ul>
                <ul>
                    <li>
                        <p class="f-nav__title"><a href="/site/partners">Партнерам</a></p>
                    </li>
                    <li>
                        <p class="f-nav__text"><a href="">Партнёрам AuxMart</a></p>
                    </li>
                    <li>
                        <p class="f-nav__text"><a href="">Врачам AuxLike</a></p>
                    </li>
                    <li>
                        <p class="f-nav__text"><a href="">Клиникам AuxLike</a></p>
                    </li>
                </ul>
                <ul class="f-nav__contacts">
                    <li>
                        <p class="f-nav__title">Контакты</p>
                    </li>
                    <li>
                        <p class="f-nav__text"><img class="f-img" src="/img/icon/f-message-icon.svg" alt=""><?=$settings->email?></p>
                        <ul class="f-soc mt-3">
                            <li class="f-soc__item"><a href="<?=$settings->vk;?>" rel="nofollow"><img src="/img/icon/vk-icon.svg" alt=""></a></li>
                            <li class="f-soc__item"><a href="<?=$settings->facebook;?>" rel="nofollow"><img src="/img/icon/face-book-icon.svg" alt=""></a></li>
                            <li class="f-soc__item"><a href="<?=$settings->instagram;?>" rel="nofollow"><img src="/img/icon/insta-icon.svg" alt=""></a></li>
                            <li class="f-soc__item"><a href="<?=$settings->facebook;?>" rel="nofollow"><img src="/img/icon/tg-icon.svg" alt=""></a></li>
                            <li class="f-soc__item"><a href="https://wa.me/<?=$settings->whatsapp;?>" rel="nofollow"><img src="/img/icon/whatsapp-icon.svg" style="width: 19px" alt=""></a></li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </div>
    <hr>
    <p class="text-center pb-5">&#169; <?=date('Y'). ' '?>ТОО «Aux Medical Group»</p>
</footer>
