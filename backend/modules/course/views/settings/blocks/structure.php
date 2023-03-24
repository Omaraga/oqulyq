<?php
/* @var $this yii\web\View */
/* @var $course \common\models\Course */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\widgets\Pjax;

$js = <<<JS
$('#create-module').click(function (e){
    e.preventDefault();
    $('#newModuleModal').modal('show');
});

$('.create-lesson').click(function (e){
    e.preventDefault();
    console.log('hello');
    let moduleId = $(this).data('module');
    let moduleName = $(this).data('modulename');
    $('#module-lesson').text('Добавление урока в '+ moduleName);
    $('#module-lesson').attr({'data-module' : moduleId});
    $('#newLessonModal').modal('show');
})

$('#send-module').click(function (e){
   var title = $('#module-title').val();
   var data = {title : title, course : '$course->id'};
   if (title.length > 0){
       $.ajax({
        method: "POST",
        url: "/course/settings/create-module",
        dataType: "json",
        data: data,
        success: function (response) {
            if (response.success == 1){
                $('#newModuleModal').modal('hide');
                $.pjax.reload({container:"#modules"});
            }

        }
    });
   }else{
       $('.help-block').text('Необходимо заполнить название модуля')
   }
});
$('#send-lesson').click(function (e){
   var title = $('#lesson-title').val();
   var module = $('#module-lesson').data('module');
   var data = {title : title, module : module, course : '$course->id'};
   if (title.length > 0){
       $.ajax({
        method: "POST",
        url: "/course/settings/create-lesson",
        dataType: "json",
        data: data,
        success: function (response) {
            if (response.success == 1){
                $('#newLessonModal').modal('hide');
                document.location.reload();
            }

        }
    });
   }else{
       $('.help-block').text('Необходимо заполнить название урока')
   }
});

JS;
$this->registerJs($js);
?>

<?=\yii\helpers\Html::a('Создать модуль',['/course/settings/create'], ['class' => 'btn btn-success mb-3', 'id' => 'create-module']);?>

<?php Pjax::begin(['id' => 'modules']) ?>
    <?= \richardfan\sortable\SortableGridView::widget([
        'dataProvider' => $dataProvider,
        'sortUrl' => \yii\helpers\Url::to(['sortItem']),
        'columns' => [
            [
                'attribute'=>'title',
                'contentOptions' => ['class' => 'text-center', 'width' => '40%', 'style' => 'vertical-align: middle;'],
                'content'=>function($data){
                    return \yii\helpers\Html::a($data['title'],'/course/module?id='.$data['id'],['style' => 'font-size: 17px;color: purple;font-weight: bold;text-decoration: none;']);
                },
                'format' => 'raw'
            ],
            [
                'label' => 'Уроки',
                'contentOptions' => ['width' => '40%'],
                'content' => function($data){
                    $html = '<div class="list-group">';
                    if ($data->lessons){
                        foreach ($data->lessons as $lesson){
                            $html.= '<a href="/course/lesson?id='.$lesson->id.'" class="list-group-item list-group-item-action mb-1">'.$lesson->title.'</a>';
                        }
                    }
                    $html.='</div>';

                    return $html;
                },
                'format' => 'raw',
            ],
            [
                'label' => 'Действия',
                'contentOptions' => ['class' => 'text-center', 'width' => '20%', 'style' => 'vertical-align: middle;'],
                'content' => function($data){
                    return \yii\helpers\Html::button('Создать урок', ['class' => 'btn btn-primary mb-3 create-lesson', 'data-module' => $data->id, 'data-moduleName' => $data->title]).
                        \yii\helpers\Html::a('Удалить', ['/course/module/delete', 'id' => $data->id], ['class' => 'btn btn-danger mb-3 ml-1', 'onclick' => "return confirm('Вы действительно хотите удалить модуль?')"]);
                },
                'format' => 'raw',
            ]


        ],
    ]); ?>
<?php yii\widgets\Pjax::end(); ?>

<?php \yii\bootstrap4\Modal::begin([
    'id' => 'newModuleModal',
    'title' => 'Создать модуль'
]);?>
    <div id ="modalContentCreate">
        <div class="form-group">
            <label for="module-title">Название модуля</label>
            <input type="text" class="form-control" name="title" id="module-title">
            <div class="help-block">

            </div>
        </div>
        <button id="send-module" class="btn btn-success">Создать</button>


    </div>

<?php \yii\bootstrap4\Modal::end();?>

<?php \yii\bootstrap4\Modal::begin([
    'id' => 'newLessonModal',
    'title' => 'Создать урок'
]);?>
<div id ="modalContentCreate">
    <h5 id="module-lesson"></h5>
    <div class="form-group">
        <label for="lesson-title">Название урока</label>
        <input type="text" class="form-control" name="title" id="lesson-title">
        <div class="help-block">

        </div>
    </div>
    <button id="send-lesson" class="btn btn-success">Создать</button>


</div>

<?php \yii\bootstrap4\Modal::end();?>
