<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "phonebook".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property integer $number
 */
class Phonebook extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'phonebook';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'number'], 'required'],
            [['number'], 'integer'],
            [['name', 'email'], 'string', 'max' => 55],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'number' => 'Number',
        ];
    }
}
