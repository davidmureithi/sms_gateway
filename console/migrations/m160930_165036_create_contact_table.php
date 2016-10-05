<?php

use yii\db\Migration;

/**
 * Handles the creation for table `contact`.
 */
class m160930_165036_create_contact_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('contact', [
            'id' => $this->primaryKey(),
            'name' => $this->string(55)->notNull(),
            'contact' => $this->integer(15)->notNull(),
            'email' => $this->string(55)->notNull(),
            'note' => $this->string(100)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('contact');
    }
}
