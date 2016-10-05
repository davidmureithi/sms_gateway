<?php

use yii\db\Migration;

/**
 * Handles the creation for table `outbox`.
 */
class m160930_165154_create_outbox_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('outbox', [
            'id' => $this->primaryKey(),
            'contact' => $this->integer(15)->notNull(),
            'message' => $this->string()->notNull(),
            'sent_by' => $this->string()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'sent_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('outbox');
    }
}
