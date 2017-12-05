<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "userdata".
 *
 * @property int $id
 * @property int $id_fk
 * @property string $userIp
 * @property string $browser
 *
 * @property Contact $fk
 */
class Userdata extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'userdata';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_fk'], 'integer'],
            [['userIp', 'browser'], 'string', 'max' => 255],
            [['id_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Contact::className(), 'targetAttribute' => ['id_fk' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_fk' => 'Id Fk',
            'userIp' => 'User Ip',
            'browser' => 'Browser',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFk()
    {
        return $this->hasOne(Contact::className(), ['id' => 'id_fk']);
    }
}
