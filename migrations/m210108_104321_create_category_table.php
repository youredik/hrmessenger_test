<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 *
 * Команда на создание из консоли:
 * yii migrate/create create_category_table --fields="title:string:notNull"
 */
class m210108_104321_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%category}}');
    }
}
