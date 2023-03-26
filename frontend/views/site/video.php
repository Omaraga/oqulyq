<?php
/* @var $this yii\web\View */
/* @var $check_news frontend\controllers\SiteController */
/* @var $dataProvider \yii\data\ActiveDataProvider */

use yii\helpers\Url;
$settings = \common\models\Settings::find()->one();
$this->title = 'Видеоролики';

?>
<main class="landing container">
    <h1 class="my-3 text-center">Видеоролики</h1>
    <div class="row">
        <div class="col-12 mt-2">
            <div class="row p-3">
                <?foreach ($dataProvider->getModels() as $model):?>
                    <div class="col-4">
                        <iframe width="100%" height="200"
                                src="<?=$model->url;?>">
                        </iframe>
                    </div>

                <?endforeach;?>
            </div>
        </div>

    </div>

</main>
