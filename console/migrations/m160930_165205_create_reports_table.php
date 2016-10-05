<?php

use yii\db\Migration;

/**
 * Handles the creation for table `reports`.
 */
class m160930_165205_create_reports_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('reports', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('reports');
    }
}
