<div style="padding: 200px">
    <form class="form" action="/pay/request" method="POST">
        <div class="row">
            <div class="col-lg-6">
                <?
                $user = \common\models\User::find()->where(['id'=>Yii::$app->user->identity])->one();
                $price = 10;
                ?>
                <input type="hidden" name="user_id" value="<?=$user->id?>">
                <h3><?=$user->getShortFio()?></h3>
                <div class="form-group mt-3">
                    <input type="hidden" class="form-control" name="amount" value="<?=$price?>" ><BR>
                    <h2 class="h2">К оплате: <?=$price?> тг.</h2>
                    <input type="hidden" class="form-control" name="amount_usd" value="<?=$price?>" ><BR>
                </div>
                <div class="d-grid gap-2 modale__body-button mt-3">
                    <input class="btn__blue btn btn__small" type="submit" value="Оплатить">
                </div>


            </div>
        </div>
    </form>
</div>