<?php

use yii\db\Migration;

/**
 * Class m191028_175221_create_fk_client_city_tables
 */
class m191028_175221_create_fk_client_city_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->addForeignKey('fk_client_city', 'client', ['city_id'], 'city',
        ['id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
      $this->dropForeignKey('fk_client_city', 'client');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191028_175221_create_fk_client_city_tables cannot be reverted.\n";

        return false;
    }
    */
}
