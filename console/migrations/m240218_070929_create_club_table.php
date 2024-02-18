<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%club}}`.
 */
class m240218_070929_create_club_table extends Migration
{
    public function safeUp()
    {
        // Create the 'club' table
        $this->createTable('club', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'address' => $this->text()->notNull(),
            'date_of_creation' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'created_by' => $this->integer()->notNull(),
            'update_date' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
            'updated_by' => $this->integer(),
            'deletion_date' => $this->dateTime(),
            'deleted_by' => $this->integer(),
        ]);

        

        
    }

    public function safeDown()
    {
       
        $this->dropTable('club');
    }
}
