<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%partners}}`.
 */
class m200602_004448_create_partners_table extends Migration
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

        $this->createTable('{{%partners}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'web_user_id' => $this->string()->notNull(),
            'site' => $this->string()->notNull(),
            'utm' => $this->string()->notNull(),
            'active' => $this->smallInteger()->notNull()->defaultValue(0),
            'type' => $this->smallInteger()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey(
            'fk-partners-user_id',
            'partners',
            'user_id',
            'users',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-partners-user_id',
            'post'
        );

        $this->dropTable('{{%partners}}');
    }
}
