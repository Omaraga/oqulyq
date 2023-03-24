<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payments}}`.
 */
class m220610_134000_create_payments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%payments}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'course_id' => $this->integer(),
            'user_id' => $this->integer(),
            'email' => $this->string(),
            'type' => $this->integer(),
            'is_deleted' => $this->integer()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'info' => $this->text(),
        ]);
        $this->addForeignKey(
            'fk-payments-course-id',
            'payments',
            'course_id',
            'course',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-payments-user-id',
            'payments',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-payments-course-id', 'payments');
        $this->dropForeignKey('fk-payments-user-id', 'payments');
        $this->dropTable('{{%payments}}');
    }
}



