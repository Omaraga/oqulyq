<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_kid}}`.
 */
class m220525_144828_create_user_kid_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_kid}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11),
            'kid_id' => $this->integer(11),
        ]);
        $this->addForeignKey('fk-user_kid-user', '{{%user_kid}}', 'user_id', '{{%user}}', 'id', 'CASCADE');
        $this->addForeignKey('fk-user_kid-kid', '{{%user_kid}}', 'kid_id', '{{%kid}}', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-user_kid-kid', '{{%user_kid}}');
        $this->dropForeignKey('fk-user_kid-user', '{{%user_kid}}');
        $this->dropTable('{{%user_kid}}');
    }
}
