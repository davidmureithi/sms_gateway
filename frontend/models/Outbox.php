<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "outbox".
 *
 * @property integer $id
 * @property integer $contact
 * @property string $message
 * @property string $sent_by
 * @property integer $status
 * @property integer $created_at
 * @property integer $sent_at
 */
class Outbox extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'outbox';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contact', 'message', 'sent_by', 'created_at', 'sent_at'], 'required'],
            [['contact', 'status', 'created_at', 'sent_at'], 'integer'],
            [['message', 'sent_by'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'contact' => 'Contact',
            'message' => 'Message',
            'sent_by' => 'Sent By',
            'status' => 'Status',
            'created_at' => 'Created At',
            'sent_at' => 'Sent At',
        ];
    }
}
