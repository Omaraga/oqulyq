<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%module}}`.
 */
class m220501_111625_create_module_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%module}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255),
            'course_id' => $this->integer(11),
            'sort' => $this->integer(11)->defaultValue(0),
            'is_deleted' => $this->integer(1)->defaultValue(0),

        ]);
        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-module-course-id',
            'module',
            'course_id',
            'course',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `category`
        $this->dropForeignKey(
            'fk-module-course-id',
            'module'
        );
        $this->dropTable('{{%module}}');


    }
}
