<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%web_user_purchases}}`.
 */
class m200604_004011_create_web_user_purchases_table extends Migration
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

        $this->createTable('{{%web_user_purchases}}', [
            'id' => $this->primaryKey(),
            'web_user_id' => $this->integer()->notNull(),
            'subscription_id' => $this->integer()->notNull(),
            'subscription_expires' => $this->integer()->notNull(),
            'course_id' => $this->integer()->notNull(),
            'issue_id' => $this->integer()->notNull(),
            'package_id' => $this->integer()->notNull(),
            'exam_id' => $this->integer()->notNull(),
            'exam_left' => $this->integer()->notNull(),
            'issue_ios_key' => $this->string()->notNull(),
            'issue_andriod_key' => $this->string()->notNull(),
            'transaction_receipt' => $this->string()->notNull(),
            'gift' => $this->integer()->notNull(),
            'state' => $this->integer()->notNull(),
            'pay_service' => $this->string()->notNull(),
            'platform_id' => $this->integer()->notNull(),
            'currency_id' => $this->integer()->notNull(),
            'cost' => $this->double()->notNull(),
            'discount' => $this->double()->notNull(),
            'payment_amount' => $this->double()->notNull(),
            'payment_date' => $this->integer()->notNull(),
            'list_discounts' => $this->text()->notNull(),
            'reference_id' => $this->integer()->notNull(),
            'capchup_after_10_min' => $this->integer()->notNull(),
            'catchup_next_day' => $this->integer()->notNull(),
            'subscription_end' => $this->integer()->notNull(),
            'created' => $this->integer()->notNull(),
            'modified' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%web_user_purchases}}');
    }
}
