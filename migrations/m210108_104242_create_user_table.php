<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 *
 * Команда на создание из консоли:
 * yii migrate/create create_user_table --fields="id:bigPrimaryKey,name:string:notNull,access_token:string(32):notNull:unique"
 */
class m210108_104242_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->bigPrimaryKey(),
            'name' => $this->string()->notNull(),
            'access_token' => $this->string(32)->notNull()->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
