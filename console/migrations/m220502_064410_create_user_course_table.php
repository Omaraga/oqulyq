<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_course}}`.
 */
class m220502_064410_create_user_course_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_course}}', [
            'id' => $this->primaryKey(),
            'course_id' => $this->integer(11)->notNull(),
            'user_id' => $this->integer(11)->notNull(),
            'ts' => $this->integer(11),
            'is_deleted' => $this->integer(1)->defaultValue(0),
        ]);
        $this->addForeignKey(
            'fk-user-course-course-id',
            'user_course',
            'course_id',
            'course',
            'id'
        );
        $this->addForeignKey(
            'fk-user-course-user-id',
            'user_course',
            'user_id',
            'user',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-user-course-course-id',
            'user_course'
        );

        $this->dropForeignKey(
            'fk-user-course-user-id',
            'user_course'
        );
        $this->dropTable('{{%user_course}}');
    }
}
