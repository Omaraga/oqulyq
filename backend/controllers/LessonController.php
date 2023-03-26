<?php

namespace backend\controllers;

use common\models\Book;
use common\models\Dictionary;
use common\models\Lesson;
use richardfan\sortable\SortableAction;
use yii\base\BaseObject;
use yii\data\ActiveDataProvider;

/**
 * JobController implements the CRUD actions for Job model.
 */
class LessonController extends BaseCrudController
{

    protected $modelClass = Lesson::class;
    public $modelLabel = 'Уроки';

    public function actions()
    {
        return [
            'sortItem' => [
                'class' => SortableAction::className(),
                'activeRecordClassName' => $this->modelClass,
                'orderColumn' => 'sort',
            ],
            // your other actions
        ];
    }

}
