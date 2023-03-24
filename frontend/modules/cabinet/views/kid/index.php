<?php
use yii\helpers\Html;
?>

<main class="main-course">
    <div class="container-fliud">
        <div class="row">
            <div class="col-9">
                <div class="form-group mt-3">
                    <a href="/cabinet/kid/create" class="btn bg-green">Добавить ребенка</a>
                </div>
                <? foreach ($model as $kid) : ?>
                    <?=$this->render('_form', ['model' => $kid, 'readonly' => true])?>
                    <div class="form-group mt-3">
                        <?= Html::a(Yii::t('app', 'Редактировать'), ['update', 'id' => $kid->id], ['class' => 'btn bg-green']) ?>
                        <?= Html::a(Yii::t('app', 'Удалить ребенка'), ['delete', 'id' => $kid->id], [
                            'class' => 'btn btn-border',
                            'data' => [
                                'confirm' => Yii::t('app', 'Вы действительно хотите удалить?'),
                                'method' => 'post',
                            ],
                        ]) ?>
                    </div>
                <? endforeach; ?>
            </div>

            <div class="col-3">
                <?=$this->render('@app/modules/cabinet/views/user/side.php')?>
            </div>
        </div>
    </div>
</main>