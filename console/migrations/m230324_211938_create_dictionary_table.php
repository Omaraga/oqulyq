<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dictionary}}`.
 */
class m230324_211938_create_dictionary_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%dictionary}}', [
            'id' => $this->primaryKey(),
            'ru' => $this->text(),
            'kz' => $this->text(),
            'lesson_id' => $this->integer(11),
            'type' => $this->integer(2),
            'info' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%dictionary}}');
    }
}
