<?php

namespace common\models;

use common\traits\AttributesToInfoTrait;
use Yii;
use common\components\ActiveRecord;

/**
 * This is the model class for table "tags".
 *
 * @property int $id
 * @property string $name
 * @property int $status
 */
class Tags extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    use AttributesToInfoTrait;



    public static function tableName()
    {
        return 'tags';
    }

    public function attributesToInfo()
    {
        return [
            'tags'
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'status' => 'Status',
        ];
    }
    public function getNews()
    {
        return $this->hasMany(News::className(), ['tags' => 'id']);
    }

}
