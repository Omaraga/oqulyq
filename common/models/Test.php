<?php

namespace common\models;

use common\components\ActiveRecord;
use common\traits\AttributesToInfoTrait;
use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "dictionary".
 *
 * @property int $id
 * @property string $question
 * @property string $right_answer
 * @property string $wrong_answer_1
 * @property string $wrong_answer_2
 * @property string $wrong_answer_3
 * @property int $lesson_id [int(11)]
 */
class Test extends ActiveRecord
{

    public static function tableName()
    {
        return 'test';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['question', 'right_answer', 'wrong_answer_1', 'lesson_id'], 'required'],
            [['wrong_answer_2', 'wrong_answer_3'], 'safe']

        ];
    }


    public function save($runValidation = true, $attributeNames = null)
    {
        return parent::save($runValidation, $attributeNames);
    }


    public function getLesson(){
        return $this->hasOne(Lesson::className(), ['id' => 'lesson_id']);
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'question' => Yii::t('app', 'Вопрос'),
            'right_answer' => Yii::t('app', 'Правильный ответ'),
            'wrong_answer_1' => Yii::t('app', 'Не правильный ответ'),
            'wrong_answer_2' => Yii::t('app', 'Не правильный ответ'),
            'wrong_answer_3' => Yii::t('app', 'Не правильный ответ'),
            'lesson_id' => Yii::t('app', 'Урок'),

        ];
    }
}
