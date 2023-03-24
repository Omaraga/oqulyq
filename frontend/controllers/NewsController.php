<?php

namespace frontend\controllers;

use common\models\News;
use yii\data\Sort;

class NewsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $sort = new Sort([
            'attributes' => [
                'date' => [
                    'asc' => ['created_at' => SORT_ASC],
                    'desc' => ['created_at' => SORT_DESC],
                    'default' => ['created_at' => SORT_ASC],
                    'label' => 'Дате публикации',
                ],
            ],
        ]);
        if (empty($sort->orders)) {
            $models = News::find()
                ->where(['status' => News::STATUS_PUBLISH])
                ->orderBy(['created_at' => SORT_DESC])
                ->all();
        }else {
            $models = News::find()
                ->where(['status' => News::STATUS_PUBLISH])
                ->orderBy($sort->orders)
                ->all();
        }
        return $this->render('index', [
            'models' => $models,
            'sort' => $sort,
        ]);
//        $news = News::find()->where(['status' => News::STATUS_PUBLISH])->orderBy(['created_at'=> SORT_DESC ])->all();
//        return $this->render('index', [
//            'news' => $news,
//        ]);
    }

    public function actionView($id)
    {
        $models = News::findOne($id);
        $news = News::find()->where(['status' => News::STATUS_PUBLISH])->orderBy(['created_at'=> SORT_DESC ])->limit('5')->all();
        return $this->render('view', [
            'model' => $models,
            'news' => $news,
        ]);
    }

    /**
     * @return mixed
     * обрезает текст по количеству слов
     * $val = количество выводимых слов
     * $text = получаемый текст для обрезки
     */
    public static function getShortText($text, $val=null){
        if (!$val) {
            $val = 15;
        }
        $array = explode(" ", strip_tags($text));
        $array = array_slice($array, 0, $val);
        return implode(" ", $array) . '...';
    }
}
