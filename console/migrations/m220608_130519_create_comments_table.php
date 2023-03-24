<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comments}}`.
 */
class m220608_130519_create_comments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comments}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'message' => $this->string(255),
            'type' => $this->integer(1),
            'target_id' => $this->integer(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'is_deleted' => $this->integer(1)->defaultValue(0),
            'info' => $this->text(),
        ]);
        $this->addForeignKey('fk-comments-user', '{{%comments}}', 'user_id', '{{%user}}', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-comments-user', '{{%comments}}');
        $this->dropTable('{{%comments}}');
    }
}
