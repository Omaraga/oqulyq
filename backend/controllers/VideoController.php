<?php

namespace backend\controllers;

use common\models\Book;
use common\models\Dictionary;
use common\models\Video;
use richardfan\sortable\SortableAction;
use yii\base\BaseObject;
use yii\data\ActiveDataProvider;

/**
 * JobController implements the CRUD actions for Job model.
 */
class VideoController extends BaseCrudController
{

    protected $modelClass = Video::class;
    public $modelLabel = 'Видеоролики';

}
