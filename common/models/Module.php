<?php

namespace common\models;

use Yii;
use common\components\ActiveRecord;

/**
 * This is the model class for table "module".
 *
 * @property int $id
 * @property string|null $title
 * @property int|null $course_id
 * @property int|null $sort
 * @property int|null $is_deleted
 *
 * @property Course $course
 * @property Lesson[] $lessons
 */
class Module extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'module';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_id', 'sort', 'is_deleted'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'id']],
            [['sort'], 'default', 'value' => function ($model, $attribute) {
                return self::find()->where(['course_id' => $model->course_id])->count();
            }],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Название модуля'),
            'course_id' => Yii::t('app', 'Курс'),
            'sort' => Yii::t('app', 'Sort'),
            'is_deleted' => Yii::t('app', 'Is Deleted'),
        ];
    }

    /**
     * Gets query for [[Course]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['id' => 'course_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLessons(){
        return $this->hasMany(Lesson::className(), ['module_id' => 'id']);
    }
}
