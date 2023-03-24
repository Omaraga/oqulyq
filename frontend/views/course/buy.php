
<main>
<!--    <div class="main-container course-buy">-->
<!--        <div class="buy-content">-->
<!--            <div class="main-title">-->
<!--                <p>Оформление заказа</p>-->
<!--            </div>-->
<!---->
<!--            <div class="buy-input-group">-->
<!--                <p class="buy-title">Краткое описание</p>-->
<!--                <input class="buy-input__main" type="text" placeholder="Имя на карте">-->
<!--                <input class="buy-input__main" type="text" placeholder="Номер карты">-->
<!--                <input class="buy-input__half" type="text" placeholder="мм/гг">-->
<!--                <input class="buy-input__half" ="text" placeholder="код безопасности карты">-->
<!--                <input class="buy-input__half" type="text" placeholder="Почтовый индекс">-->
<!--                <div class="buy-info">-->
<!--                    <img src="img/icon/buy-info-circle.svg" alt="">-->
<!--                    <span>Запомнить эту карту</span>-->
<!--                </div>-->
<!--            </div>-->
<!--            <p class="buy-title">Детали заказа</p>-->
<!--        </div>-->
        <div class="aside-bar" style="width: 50%; margin: auto">

            <?php
            use yii\helpers\Html;
            use yii\widgets\ActiveForm;
            ?>
            <?php $form = ActiveForm::begin(['method' => 'POST', 'action' => '/pay/request']); ?>
            <? $user = Yii::$app->user->identity->getId()?>
            <input type="hidden" class="form-control" name="amount" value="<?=$course->price?>" ><BR>
            <input type="hidden" class="form-control" name="course" value="<?=$course->id?>" ><BR>
            <input type="hidden" name="user_id" value="<?=$user?>">

            <div class="buy-card">
                <div class="buy-card__header">
                    <p class="buy-card__title">Оформление заказа</p>
                    <p class="buy-card__sum"><?=$course->price?> тг</p>
                </div>
                <hr>
                <div class="buy-card__footer">
                    <div class="buy-card__check">
                        <p>Итого :</p>
                        <p><?=$course->price?> ТГ</p>
                    </div>

                    <!--                    <a class="buy-card__link" href="">Купить</a>-->
                </div>

            <div class="form-group">
                <?= Html::submitButton('Отправить', ['class' => 'buy-card__link']) ?>
            </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
<!--        <div class="course-buy__content">-->
<!--            <a href=""><img src="" alt=""></a>-->
<!--        </div>-->
<!--    </div>-->
</main>
