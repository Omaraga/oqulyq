<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%course}}`.
 */
class m220430_165801_create_course_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%course}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255),
            'description' => $this->text(),
            'info' => $this->text(),
            'status' => $this->integer(1)->defaultValue(0),
            'type' => $this->integer(2)->defaultValue(0),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%course}}');
    }
}
