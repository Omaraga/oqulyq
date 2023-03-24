<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%lesson}}`.
 */
class m220501_204159_create_lesson_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%lesson}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255),
            'content' => $this->text(),
            'type' => $this->integer(2)->defaultValue(0),
            'course_id' => $this->integer(11)->notNull(),
            'module_id' => $this->integer(11)->notNull(),
            'info' => $this->text(),
            'is_deleted' => $this->integer(1)->defaultValue(0),

        ]);

        $this->addForeignKey(
            'fk-lesson-course-id',
            'lesson',
            'course_id',
            'course',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-lesson-module-id',
            'lesson',
            'module_id',
            'module',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-lesson-course-id',
            'lesson'
        );
        $this->dropForeignKey(
            'fk-lesson-module-id',
            'lesson'
        );
        $this->dropTable('{{%lesson}}');
    }
}
