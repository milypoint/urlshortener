<?php

use yii\db\Migration;

/**
 * Handles the creation of table `url`.
 */
class m200429_135447_create_url_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('url', [
            'id' => $this->primaryKey(),
            'url' => $this->string(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')
        ]);

        $this->execute('ALTER TABLE url AUTO_INCREMENT = 1000;');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('url');
    }
}
