<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%web_user_source_traking}}`.
 */
class m200604_004033_create_web_user_source_traking_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%web_user_source_traking}}', [
            'id' => $this->primaryKey(),
            'web_user_id' => $this->integer()->notNull(),
            'utm_source' => $this->string()->notNull(),
            'utm_campaign' => $this->string()->notNull(),
            'utm_term' => $this->string()->notNull(),
            'utm_content' => $this->string()->notNull(),
            'utm_medium' => $this->string()->notNull(),
            'transition_ts' => $this->dateTime()->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%web_user_source_traking}}');
    }
}
