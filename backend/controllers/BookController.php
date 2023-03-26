<?php

namespace backend\controllers;

use common\models\Book;
use common\models\Dictionary;
use richardfan\sortable\SortableAction;
use yii\base\BaseObject;
use yii\data\ActiveDataProvider;

/**
 * JobController implements the CRUD actions for Job model.
 */
class BookController extends BaseCrudController
{

    protected $modelClass = Book::class;
    public $modelLabel = 'Учебники';

}
