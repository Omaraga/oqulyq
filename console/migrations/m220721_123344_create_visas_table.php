<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%visas}}`.
 */
class m220721_123344_create_visas_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%visas}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11),
            'program' => $this->integer(2),
            'code' => $this->string(255),
            'amount' => $this->string(255),
            'amount_usd' => $this->string(255),
            'status' => $this->integer(1),
            'ts' => $this->integer(11),
            'status_api' => $this->integer(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%visas}}');
    }
}
