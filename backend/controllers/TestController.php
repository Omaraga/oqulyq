<?php

namespace backend\controllers;

use common\models\Dictionary;
use common\models\Test;
use richardfan\sortable\SortableAction;
use yii\base\BaseObject;
use yii\data\ActiveDataProvider;

/**
 * JobController implements the CRUD actions for Job model.
 */
class TestController extends BaseCrudController
{

    protected $modelClass = Test::class;
    public $modelLabel = 'Тест';


}
