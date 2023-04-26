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
 * @property int $sort
 * @property string|null $info
 * @property int|null $is_deleted
 *
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
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['type', 'is_deleted'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['sort'], 'default', 'value' => function ($model, $attribute) {
                return self::find()->count();
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
            'info' => Yii::t('app', 'Info'),
            'is_deleted' => Yii::t('app', 'Is Deleted'),
            'source' => Yii::t('app', 'Урок'),
        ];
    }
    public function getShortContent()
    {
        $s = $this->content;
        $s = trim(strip_tags($s));
//        $s = preg_replace('/\s+/', ' ', $s);
        $s = str_replace("&nbsp;", '', $s);
        return (mb_strlen($s, 'UTF-8') > 150 ? mb_substr($s, 0, 147, 'UTF-8') . '...' : $s);
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

}
