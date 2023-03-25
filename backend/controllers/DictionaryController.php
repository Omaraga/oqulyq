<?php

namespace backend\controllers;

use common\models\Dictionary;
use richardfan\sortable\SortableAction;
use yii\base\BaseObject;
use yii\data\ActiveDataProvider;

/**
 * JobController implements the CRUD actions for Job model.
 */
class DictionaryController extends BaseCrudController
{

    protected $modelClass = Dictionary::class;
    public $modelLabel = 'Словарь';

    public function actionIndex() {
        $type = \Yii::$app->request->get('type') ? : Dictionary::TYPE_WORD;
        $dataProvider = new ActiveDataProvider([
            'query' => Dictionary::find()->where(['type' => $type])->orderBy('ru'),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'type' => $type
        ]);
    }

}
