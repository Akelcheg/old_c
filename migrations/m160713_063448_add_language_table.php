<?php

use yii\db\Schema;
use yii\db\Migration;

class m160713_063448_add_language_table extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $table = \Yii::$app->db->schema->getTableSchema('language', true);

        if(!isset($table)) {
            $this->createTable('{{%language}}', [
                'id' => Schema::TYPE_PK,
                'url' => Schema::TYPE_STRING . '(255) NOT NULL',
                'icon' => Schema::TYPE_STRING . '(255) NOT NULL',
                'local' => Schema::TYPE_STRING . '(255) NOT NULL',
                'name' => Schema::TYPE_STRING . '(255) NOT NULL',
                'default' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 0',
                'date_update' => Schema::TYPE_INTEGER . ' NOT NULL',
                'date_create' => Schema::TYPE_INTEGER . ' NOT NULL',
            ], $tableOptions);
        }

        $this->batchInsert('language', ['url', 'local', 'name', 'default', 'date_update', 'date_create'], [
            ['en', 'en-EN', 'English', 0, time(), time()],
            ['ru', 'ru-RU', 'Русский', 1, time(), time()],
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%language}}');
    }
}
