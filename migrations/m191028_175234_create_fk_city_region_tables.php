<?php

use yii\db\Migration;

/**
 * Class m191028_175234_create_fk_city_region_tables
 */
class m191028_175234_create_fk_city_region_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->addForeignKey('fk_city_region', 'city', ['region_id'], 'region',
        ['id'], 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
      $this->dropForeignKey('fk_city_region', 'city');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191028_175234_create_fk_city_region_tables cannot be reverted.\n";

        return false;
    }
    */
}
