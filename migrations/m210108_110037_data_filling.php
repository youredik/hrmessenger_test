<?php

use yii\db\Migration;

/**
 * Class m210108_110037_data_filling
 */
class m210108_110037_data_filling extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%category}}', ['id', 'title'], [
            [1, 'Горные лыжи'],
            [2, 'Куртка'],
            [3, 'Брюки'],
            [4, 'Шлем'],
            [5, 'Комбинезон'],
            [6, 'Перчатки'],
        ]);

        $this->batchInsert('{{%user}}', ['id', 'name', 'access_token'], [
            [1, 'Эдуард', 'LMzTZ9qAs4MpRxX_-GEfrmFQpSFGSZJD'],
            [2, 'Екатерина', 'qI98vsedIwH7nMNAcpzQ0dPUXhRYDSga'],
            [3, 'Вероника', 'tTB-TnAzJMgKYTdTim0nq4ToCv9xmAkY'],
            [4, 'Эвелина', 'Q81S6qJnUrrha8CGemm8bpYlNnLbbYVk'],
        ]);

        $this->batchInsert('{{%product}}', ['id', 'title', 'user_id', 'category_id'], [
            [1, 'Куртка горнолыжная для фрирайда', 1, 2],
            [2, 'Брюки лыжные', 3, 3],
            [3, 'Лыжи для трассового катания', 1, 1],
            [4, 'Куртка для катания на сноуборде и лыжах', 2, 2],
            [5, 'Шлем лыжный с защитным козырьком', 4, 4],
        ]);

        $this->batchInsert('{{%tag}}', ['id', 'title'], [
            [1, 'Одежда'],
            [2, 'Горные лыжи'],
            [3, 'Ботинки'],
            [4, 'Палки'],
            [5, 'Аксессуары'],
            [6, 'Шлемы и защита'],
            [7, 'Маски и очки'],
        ]);

        $this->batchInsert('{{%tag_product}}', ['tag_id', 'product_id'], [
            [1, 1],
            [1, 2],
            [1, 3],
            [2, 4],
            [2, 5],
            [3, 2],
            [3, 1],
            [4, 4],
            [5, 4],
            [6, 5],
            [7, 5],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210108_110037_data_filling cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210108_110037_data_filling cannot be reverted.\n";

        return false;
    }
    */
}
