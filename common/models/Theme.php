<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "theme".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $info
 * @property int|null $is_deleted
 */
class Theme extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'theme';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['info'], 'string'],
            [['is_deleted'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'info' => Yii::t('app', 'Info'),
            'is_deleted' => Yii::t('app', 'Is Deleted'),
        ];
    }

    /**
     * @return array|Theme[]|\yii\db\ActiveRecord[]
     */
    public static function getThemeList(){
        return self::find()->all();
    }
}
