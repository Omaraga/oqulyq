<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%test}}`.
 */
class m230326_101740_create_test_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%test}}', [
            'id' => $this->primaryKey(),
            'lesson_id' => $this->integer(11),
            'question' => $this->text(),
            'right_answer' => $this->text(),
            'wrong_answer_1' => $this->text(),
            'wrong_answer_2' => $this->text(),
            'wrong_answer_3' => $this->text(),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%test}}');
    }
}
