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
 * @property string $url
 */
class Video extends ActiveRecord
{

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
        return 'video';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['url'], 'required'],

        ];
    }


    public function save($runValidation = true, $attributeNames = null)
    {
        if (str_contains($this->url, 'youtu.be')){
            $url = 'https://www.youtube.com/embed/';
            $video_tag = explode('/', $this->url);
            $this->url = $url.$video_tag[sizeof($video_tag) - 1];
        }

        return parent::save($runValidation, $attributeNames);
    }




    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'url' => Yii::t('app', 'Ссылка вставки youtube'),

        ];
    }
}
