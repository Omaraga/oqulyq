<?php
/* @var $this yii\web\View */
/* @var $tickets common\models\Tickets[] */
/* @var $ticket common\models\Tickets */
$this->title = 'Техникалық қолдау';

?>
<main class="teh">
    <div class="container-fluid">
        <h1 class="h1 w5">Техникалық қолдау</h1>
        <div class="row flex-wrap-reverse">
            <div class="box__left box__left__tickets col-12 col-lg-4">
                <a class="btn logic-bottom-button" style="width: 200px!important;" href="/tickets?id=new">
                    <img src="./img/main/plus.svg" alt="">
                    Жаңа сұраным жасау
                </a>

                <div style="height: 80%;">
                    <ul class="nav nav-pills teh__left-list mb-3" id="pills-tab" role="tablist"
                        style="overflow-y: scroll; max-height: 100%;display: block;}">
                        <? foreach ($tickets as $item): ?>
                            <li class="nav-item left-nav-item" role="presentation">
                                <a class="nav-link teh__left-item <?= ($ticket['id'] == $item['id']) ? 'active' : ''; ?>"
                                   href="/tickets?id=<?= $item['id'] ?>">
                                    <div class="w100proc">
                                        <div class="d-flex justify-content-between">
                                            <div class="">
                                                <p class="w5 title">Номер: <?= $item['id']; ?></p>
                                                <p class="text__small"><?= date('d.m.Y H:i', $item['time']) ?></p>
                                            </div>
                                            <?if($item['status']==3):?>
                                                <span class="span__yallow">Өңдеуде</span>
                                            <?elseif ($item['status']==2):?>
                                                <span class="span__blue">Жауап жіберілді</span>
                                            <?elseif($item['status']==1):?>
                                                <span class="span__green">Аяқталды</span>
                                            <?endif;?>

                                        </div>
                                        <span>Тема: <?= $item['title'] ?></span>
                                    </div>
                                </a>
                            </li>
                        <? endforeach; ?>
                    </ul>
                </div>
            </div>

</main>
