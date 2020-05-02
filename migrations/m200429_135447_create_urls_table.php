<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%urls}}`.
 */
class m200429_135447_create_urls_table extends Migration
{
    const table_name = 'urls';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::table_name, [
            'id' => $this->primaryKey(),
            'url' => $this->string(2048),
            'date' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')
        ]);

        $this->execute('ALTER TABLE '.self::table_name.' AUTO_INCREMENT = 1000;');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::table_name);
    }
}
