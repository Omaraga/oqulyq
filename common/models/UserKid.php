<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_kid".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $kid_id
 *
 * @property Kid $kid
 * @property User $user
 */
class UserKid extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_kid';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'kid_id'], 'integer'],
            [['kid_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kid::className(), 'targetAttribute' => ['kid_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'ID родителя',
            'kid_id' => 'ID ребенка',
        ];
    }

    /**
     * Gets query for [[Kid]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKid()
    {
        return $this->hasOne(Kid::className(), ['id' => 'kid_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
