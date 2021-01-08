<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tag_product}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%tag}}`
 * - `{{%product}}`
 *
 * Команда на создание из консоли:
 * yii migrate/create create_junction_table_for_tag_and_product_tables
 */
class m210108_104440_create_junction_table_for_tag_and_product_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tag_product}}', [
            'tag_id' => $this->integer(),
            'product_id' => $this->integer(),
            'PRIMARY KEY(tag_id, product_id)',
        ]);

        // creates index for column `tag_id`
        $this->createIndex(
            '{{%idx-tag_product-tag_id}}',
            '{{%tag_product}}',
            'tag_id'
        );

        // add foreign key for table `{{%tag}}`
        $this->addForeignKey(
            '{{%fk-tag_product-tag_id}}',
            '{{%tag_product}}',
            'tag_id',
            '{{%tag}}',
            'id',
            'CASCADE'
        );

        // creates index for column `product_id`
        $this->createIndex(
            '{{%idx-tag_product-product_id}}',
            '{{%tag_product}}',
            'product_id'
        );

        // add foreign key for table `{{%product}}`
        $this->addForeignKey(
            '{{%fk-tag_product-product_id}}',
            '{{%tag_product}}',
            'product_id',
            '{{%product}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%tag}}`
        $this->dropForeignKey(
            '{{%fk-tag_product-tag_id}}',
            '{{%tag_product}}'
        );

        // drops index for column `tag_id`
        $this->dropIndex(
            '{{%idx-tag_product-tag_id}}',
            '{{%tag_product}}'
        );

        // drops foreign key for table `{{%product}}`
        $this->dropForeignKey(
            '{{%fk-tag_product-product_id}}',
            '{{%tag_product}}'
        );

        // drops index for column `product_id`
        $this->dropIndex(
            '{{%idx-tag_product-product_id}}',
            '{{%tag_product}}'
        );

        $this->dropTable('{{%tag_product}}');
    }
}
