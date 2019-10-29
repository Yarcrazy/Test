<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%files}}`.
 */
class m191028_173728_create_files_table extends Migration
{
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $this->createTable('{{%files}}', [
      'id' => $this->primaryKey(),
      'name' => $this->string()->notNull(),
      'size' => $this->string()->notNull(),
      'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
    ]);
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropTable('{{%files}}');
  }
}
