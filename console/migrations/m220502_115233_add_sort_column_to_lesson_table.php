<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%lesson}}`.
 */
class m220502_115233_add_sort_column_to_lesson_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%lesson}}', 'sort', $this->integer(11)->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%lesson}}', 'sort');
    }
}
