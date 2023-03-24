<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payment}}`.
 */
class m220608_131443_create_payment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%payment}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'course_id' => $this->integer(),
            'cost' => $this->text(),
            'payment_type' => $this->integer(1),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'is_deleted' => $this->integer(1)->defaultValue(0),
            'info' => $this->text(),
        ]);
        $this->addForeignKey('fk-payment-user', '{{%payment}}', 'user_id', '{{%user}}', 'id', 'CASCADE');
        $this->addForeignKey('fk-payment-course', '{{%payment}}', 'course_id', '{{%course}}', 'id', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-payment-user', '{{%payment}}');
        $this->dropForeignKey('fk-payment-course', '{{%payment}}');
        $this->dropTable('{{%payment}}');
    }
}
