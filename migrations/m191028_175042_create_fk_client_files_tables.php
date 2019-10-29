<?php

use yii\db\Migration;

/**
 * Class m191028_175042_create_fk_client_files_tables
 */
class m191028_175042_create_fk_client_files_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->addForeignKey('fk_client_files', 'client', ['logo_id'], 'files',
        ['id'], 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
      $this->dropForeignKey('fk_client_files', 'client');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191028_175042_create_fk_client_files_tables cannot be reverted.\n";

        return false;
    }
    */
}
