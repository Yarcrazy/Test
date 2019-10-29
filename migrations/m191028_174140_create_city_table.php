<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%city}}`.
 */
class m191028_174140_create_city_table extends Migration
{
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $this->createTable('{{%city}}', [
      'id' => $this->primaryKey(),
      'name' => $this->string()->notNull(),
      'region_id' => $this->integer()->notNull(),
    ]);
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropTable('{{%city}}');
  }
}
