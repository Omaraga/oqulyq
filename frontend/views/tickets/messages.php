<?php
$this->title = 'Техникалық қолдау';

$this->registerJs('
$(".file-upload input[type=file]").change(function(){
         let filename = $(this).val().replace(/.*\\\/, "");
         $(this).closest(".file-upload").find(".filename").val (filename);
      
       });
       $(".remove").click(function(){
         $(this).closest(".file-upload").find(".upload")[0].files.value = "";
         $(this).closest(".file-upload").find(".filename").val ("");
       })', yii\web\View::POS_READY);

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

            <div class="box__right col-lg-6 col-12">
                <div class="tab-content right-tab" id="pills-tabContent" style="">
                    <div class="tab-pane active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="d-block d-sm-none">
                            <a class="btn btn__blue" href="/tickets" style="width: 100%; font-size: 1.2rem;"><i
                                        class="fa fa-chevron-left" aria-hidden="true"
                                        style="margin-right: .8rem;font-size: 1.3rem;"></i> Оралу</a>
                        </div>
                        <div class="block__right">
                            <div>
                                <h2 class="h2"><?= $ticket['title']; ?></h2>
                                <div class="">
                                    <div class="group_text">
                                        <span class="w7 title">Номер: <?= $ticket['id']; ?></span>
                                        <?if($ticket['status']==3):?>
                                            <span class="span__yallow">Өңдеуде</span>
                                        <?elseif ($ticket['status']==2):?>
                                            <span class="span__blue">Жауап жіберілді</span>
                                        <?elseif($ticket['status']==1):?>
                                            <span class="span__green">Аяқталды</span>
                                        <?endif;?>
                                    </div>
                                    <span><?= date('d.m.Y H:i', $ticket['time']) ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <? foreach ($messages as $message): ?>
                                    <div class="block_text">
                                        <div class="<?= ($message['user_id'] == 1) ? 'block_text-header' : 'block_text-header2'; ?>">
                                            <span><?= ($message['user_id'] == 1) ? 'Техникалық қолдау' : $user['fio']; ?></span>
                                            <span><?= date('d.m.Y H:i', $message['time']) ?></span>
                                        </div>
                                        <div class="block_text-body">
                                            <p class="text__small">
                                                <?= $message['text']; ?>

                                                <? if (!empty($message['link'])){ ?>
                                                    <p><a href="<?= $message['link'] ?>" class="">Файлды жуктеу</a></p>
                                                <? } ?>
                                            </p>
                                        </div>
                                    </div>
                                <? endforeach; ?>
                            </div>
                            <?php $form = \yii\widgets\ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>``
                            <div class="block-form">
                                <div class="item">
                                    <h6 class="w7">Хабарлама</h6>
                                    <?= $form->field($messageForm, 'text', ['options' => ['class' => 'form-floating p-0']])->textarea(['class' => 'form-control', 'id' => 'floatingTextarea'])->label(false); ?>

                                    <label for="basic-url" class="form-label text__small mt-3">Файл</label>
                                    <div class="mt-4 ">
                                        <div class="file-upload">
                                            <div class="mt-2 fild__name-group">
                                                <input type="text" id="filenameed" class="filename fild__name-group" disabled>
                                                <span class="remove">X</span>
                                            </div>
                                            <label>
                                                <?= $form->field($messageForm, 'file')->fileInput(['class'=>'upload hide', 'id'=>'uploaded'])->label(false);?>
                                                <label class="btn logic-bottom-button" for="uploaded">Файл таңдау</label>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="change_buttons">
                                    <button class="btn logic-bottom-button" type="submit">Сақтау</button>
                                </div>
                            </div>
                            <?php \yii\widgets\ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
</main>
