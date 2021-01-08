<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tag}}`.
 *
 * Команда на создание из консоли:
 * yii migrate/create create_tag_table --fields="title:string:notNull"
 */
class m210108_104434_create_tag_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tag}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tag}}');
    }
}
