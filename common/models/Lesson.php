<?php

namespace common\models;

use common\traits\AttributesToInfoTrait;
use Yii;
use common\components\ActiveRecord;
/**
 * This is the model class for table "lesson".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $content
 * @property int|null $type
 * @property int $course_id
 * @property int $module_id
 * @property int $sort
 * @property string|null $info
 * @property string|null $source
 * @property string|null $vimeo_link
 * @property int|null $is_deleted
 *
 * @property Course $course
 * @property Module $module
 */
class Lesson extends ActiveRecord
{
    const TYPE_TEXT_LESSON = 0;
    const TYPE_VIDEO_LESSON = 1;
    const TYPE_AUDIO_LESSON = 2;
    use AttributesToInfoTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lesson';
    }
    /*
     *
     */
    public function attributesToInfo()
    {
        return [
            'source',
            'vimeo_link'
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content', 'info', 'source','vimeo_link'], 'string'],
            [['type', 'course_id', 'module_id', 'is_deleted'], 'integer'],
            [['course_id', 'module_id'], 'required'],
            [['title'], 'string', 'max' => 255],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'id']],
            [['module_id'], 'exist', 'skipOnError' => true, 'targetClass' => Module::className(), 'targetAttribute' => ['module_id' => 'id']],
            [['sort'], 'default', 'value' => function ($model, $attribute) {
                return self::find()->where(['module_id' => $model->module_id])->count();
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
            'title' => Yii::t('app', 'Название'),
            'content' => Yii::t('app', 'Описание'),
            'type' => Yii::t('app', 'Тип'),
            'course_id' => Yii::t('app', 'Course ID'),
            'module_id' => Yii::t('app', 'Module ID'),
            'info' => Yii::t('app', 'Info'),
            'is_deleted' => Yii::t('app', 'Is Deleted'),
            'source' => Yii::t('app', 'Урок'),
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
     * Gets query for [[Module]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getModule()
    {
        return $this->hasOne(Module::className(), ['id' => 'module_id']);
    }

    /**
     * @return array
     */
    public static function getTypes(){
        return [
            self::TYPE_TEXT_LESSON => Yii::t('app', 'Текстовый урок'),
            self::TYPE_VIDEO_LESSON => Yii::t('app', 'Видео урок'),
            self::TYPE_AUDIO_LESSON => Yii::t('app', 'Аудио урок'),
        ];

    }

    public function getFrame(){
        $frame = null;
        if(!empty($this->vimeo_link)){

            $link = $this->vimeo_link;
            $link = explode("/",$link);
            $link = $link[count($link)-1];
            $frame = '<iframe title="vimeo-player" src="https://player.vimeo.com/video/'.$link.'" width="100%" height="100%" frameborder="0" allowfullscreen></iframe>';

        }
        return $frame;
    }
}
