<?php

use yii\db\Migration;

class m170718_114007_create_table_issue extends Migration
{
    public function safeUp()
    {
         $this->createTable('issue', [
            'id' => $this->primaryKey(),
            'author' => $this->integer(),
            'date' => $this->date(),
            'description' => $this->string(),
            'deadLine' => $this->date(),
            'active' => $this->boolean(),
            'ready' => $this->boolean(),
            'executor' => $this->integer(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('issue');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170718_114007_create_table_issue cannot be reverted.\n";

        return false;
    }
    */
}
