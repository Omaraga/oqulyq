<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "visas".
 *
 * @property int $id
 * @property int $user_id
 * @property string $amount
 * @property int $program
 * @property string $code
 * @property string $amount_usd
 * @property int $status
 * @property int $time
 * @property int $status_api
 * @property int $premium_id
 */
class Visas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'visas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'program', 'status', 'status_api'], 'integer'],
            [['amount', 'amount_usd'], 'number'],
            [['code'], 'string', 'max' => 510],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'amount' => 'Amount',
            'program' => 'Program',
            'code' => 'Code',
            'amount_usd' => 'Amount Usd',
            'status' => 'Status',
            'time' => 'Time',
            'status_api' => 'Status Api',
            'premium_id' => 'Premium ID',
        ];
    }
}
