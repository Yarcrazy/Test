<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%client}}`.
 */
class m191028_172622_create_client_table extends Migration
{
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $this->createTable('{{%client}}', [
      'id' => $this->primaryKey(),
      'name' => $this->string()->notNull(),
      'phone' => $this->string(),
      'nds' => $this->boolean(),
      'city_id' => $this->integer()->notNull(),
      'text' => $this->text(),
      'logo_id' => $this->integer(),
      'created_at' => $this->integer(),
      'updated_at' => $this->integer(),
    ]);
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropTable('{{%client}}');
  }
}
