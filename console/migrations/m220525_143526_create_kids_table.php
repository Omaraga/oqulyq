<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%kids}}`.
 */
class m220525_143526_create_kids_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%kid}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'age' => $this->integer(3),
            'parent_id' => $this->integer(11),
            'is_deleted' => $this->integer(1)->defaultValue(0),
            'info' => $this->text(),
        ]);
        $this->addForeignKey('fk-kid-user', '{{%kid}}', 'parent_id', '{{%user}}', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-kid-user', '{{%kid}}');
        $this->dropTable('{{%kid}}');
    }
}
