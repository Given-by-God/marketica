<?php

use yii\db\Migration;

/**
 * Handles the creation of table `message`.
 */
class m171202_163510_create_contactForm_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable(
            'contact',
            [
                'id' => $this->primaryKey(),
                'name' => $this->char(255),
                'Homepage' =>$this->char(255),
                'email' => $this->char(100),
                'text' => $this->text(),
                'date' => $this->date(),
            ]
        );



    }


    /**
     * @inheritdoc
     */
    public function safeDown()
    {

        $this->dropTable('contact');
    }
}
