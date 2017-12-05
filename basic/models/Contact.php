<?php

namespace app\models;

use Yii;
use yii\db\mssql\PDO;

/**
 * This is the model class for table "contact".
 *
 * @property int $id
 * @property string $name
 * @property string $Homepage
 * @property string $email
 * @property string $text
 * @property string $date
 *
 */
class Contact extends \yii\db\ActiveRecord
{

    public $verifyCode;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text', 'name', 'email','date'], 'required'],
            ['Homepage', 'url'],
            ['email', 'email'],
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @inheritdoc
     */



    public function userData()
    {
        /*
         * выборка из бд текущего пользователя
         */

        $sql = 'select MAX(id) from contact';
        $idCurrentUser = Yii::$app->db->createCommand($sql)->queryColumn();

        /*
         * Получение пользовательских данных:
         * ip , browser
         */

        $browser = $_SERVER["HTTP_USER_AGENT"];
        $userIp = getenv('REMOTE_ADDR');


        /*
         * Запись данных в таблицу userData
         */

        $SQL = 'INSERT INTO `userData`(`id_fk`,`userIp`,`browser`)
                VALUES (:idCurrentUser,:userIp,:browser)';
        $command = Yii::$app->db->createCommand($SQL);
        $command->bindParam(":idCurrentUser", $idCurrentUser[0]);
        $command->bindParam(":userIp", $userIp );
        $command->bindParam(":browser", $browser);
        $command->execute();

    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'Homepage' => 'Homepage',
            'email' => 'Email',
            'text' => 'Text',
            'date' => 'Date',
        ];
    }

    public function getFk()
    {
        return $this->hasOne(Userdata::className(), ['id_fk' => 'id']);
    }
}
