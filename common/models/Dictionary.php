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
 * @property string|null $info
 * @property int|null $type
 * @property Module[]|null $modules
 * @property string $ru
 * @property string $kz
 * @property int $lesson_id [int(11)]
 */
class Dictionary extends ActiveRecord
{
    use AttributesToInfoTrait;

    const TYPE_WORD = 1;
    const TYPE_FRAZE = 2;

    /**
     * {@inheritdoc}
     */
    public function attributesToInfo()
    {
        return [
        ];
    }

    public static function tableName()
    {
        return 'dictionary';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ru', 'kz', 'type'], 'required'],

        ];
    }


    public function save($runValidation = true, $attributeNames = null)
    {
        return parent::save($runValidation, $attributeNames);
    }

    /**
     * @return array
     */
    public static function getTypes()
    {
        return [
            self::TYPE_WORD => Yii::t('app', 'Слова'),
            self::TYPE_FRAZE => Yii::t('app', 'Фразы'),
        ];
    }



    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'ru' => Yii::t('app', 'Руский'),
            'kz' => Yii::t('app', 'Казахский'),
            'type' => Yii::t('app', 'Тип'),
            'lesson_id' => Yii::t('app', 'Урок'),

        ];
    }
}
