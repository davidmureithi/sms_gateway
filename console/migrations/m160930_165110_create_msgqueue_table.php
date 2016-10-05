<?php

use yii\db\Migration;

/**
 * Handles the creation for table `msgqueue`.
 */
class m160930_165110_create_msgqueue_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('msgqueue', [
            'id' => $this->primaryKey(),
            'contact' => $this->integer(15)->notNull(),
            'message' => $this->string()->notNull(),
            'sent_by' => $this->string()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('msgqueue');
    }
}
