<?php
/***
 * @var $this yii\web\View
 * @var $partners common\models\Partners
 */
$this->title = 'Партнеры и Спонсоры';
$this->params['breadcrumbs'][] = $this->title;
?>

<main>
    <div class="main-container">
        <? if(!empty($sponsors)):?>
        <h1 style="text-align: center;margin: 30px 0">Наши спонсора</h1>
        <div class="partners-page">
            <?foreach ($sponsors as $sponsor):?>
            <div class="partners-img img-partners">
                <img src="<?=$sponsor->image?>" alt="">
            </div>
            <?endforeach;?>
        </div>
        <?endif;?>
        <? if(!empty($partners)):?>
        <p style="text-align: center;margin: 30px 0; font-size: 2.5rem">Наши партнеры</p>
        <div class="partners-page" style="margin-bottom: 40vh;">
            <?foreach ($partners as $partner):?>
                <div class="partners-img img-partners">
                    <img src="<?=$partner->image?>" alt="">
                </div>
            <?endforeach;?>
        </div>
        <?endif;?>
    </div>
</main>

