<?php

namespace common\models;

use common\traits\AttributesToInfoTrait;
use Yii;
use yii\behaviors\TimestampBehavior;
use common\components\ActiveRecord;


/**
 * This is the model class for table "kid".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $age
 * @property int|null $parent_id
 * @property int|null $is_deleted
 * @property string|null $info[]
 *
 * @property User $parent
 * @property UserKid[] $userKs
 */
class Kid extends ActiveRecord
{
    public $file;

    use AttributesToInfoTrait;

    public function attributesToInfo()
    {
        return [
            'first_name','last_name','middle_name','birthday', 'created_at', 'updated_at',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kid';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['age', 'parent_id', 'is_deleted'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['created_at', 'updated_at'], 'integer'],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['parent_id' => 'id']],
            [['first_name','last_name','middle_name', 'birthday'],'safe'],
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
            'age' => 'Возраст',
            'parent_id' => 'ID родителя',
            'is_deleted' => 'Удален',
            'info' => 'Info',
        ];
    }

    /**
     * Gets query for [[Parent]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(User::className(), ['id' => 'parent_id']);
    }

    /**
     * Gets query for [[UserKs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserKs()
    {
        return $this->hasMany(UserKid::className(), ['kid_id' => 'id']);
    }
}
