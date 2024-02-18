<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%client}}`.
 */
class m240218_070932_create_client_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
       // Create the 'client' table
       $this->createTable('client', [
        'id' => $this->primaryKey(),
        'full_name' => $this->string()->notNull(),
        'gender' => $this->smallInteger()->notNull(), // 1 for Male, 2 for Female
        'date_of_birth' => $this->date()->notNull(),
        'date_of_creation' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
        'created_by' => $this->integer()->notNull(),
        'update_date' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        'updated_by' => $this->integer(),
        'deletion_date' => $this->dateTime(),
        'deleted_by' => $this->integer(),
    ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('client');
    }
}
