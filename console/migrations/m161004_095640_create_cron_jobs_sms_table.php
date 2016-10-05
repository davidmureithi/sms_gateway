<?php

use yii\db\Migration;

/**
 * Handles the creation for table `cron_jobs_sms`.
 */
class m161004_095640_create_cron_jobs_sms_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('cron_jobs_sms', [
            'id' => $this->primaryKey(),
            'execute_after' => $this->timestamp(),
            'executed_at' => $this->timestamp()->Null(),
            'succeeded' => $this->boolean(),
            'action' => $this->string()()->notNull(),
            'parameters' => $this->text(),
            'execution_results' => $this->text(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('cron_jobs_sms');
    }
}
