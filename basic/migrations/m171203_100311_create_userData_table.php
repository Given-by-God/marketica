<?php

use yii\db\Migration;

/**
 * Handles the creation of table `userdata`.
 */
class m171203_100311_create_userdata_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable(
            'userdata',
            [
                'id' => $this->primaryKey(),
                'id_fk' => $this->integer(),
                'userIp' => $this->char(255),
                'browser' => $this->char(255),
            ]
        );

        $this->createIndex(
            'idx-userDate-id_fk',
            'userdata',
            'id_fk'
        );

        $this->addForeignKey(
            'fk-userDate-id_fk',
            'userdata',
            'id_fk',
            'contact',
            'id'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {

        $this->dropForeignKey(
            'fk-userDate-id_fk',
            'userdata'
        );
        $this->dropIndex(
            'idx-userDate-id_fk',
            'userdata'
        );
        $this->dropTable('userdata');
    }
}
