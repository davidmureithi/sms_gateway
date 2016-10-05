<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "msgqueue".
 *
 * @property integer $id
 * @property integer $contact
 * @property string $message
 * @property string $sent_by
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $note
 */
class Msgqueue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'msgqueue';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contact', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['message', 'sent_by'], 'string', 'max' => 255],
            [['note'], 'string', 'max' => 100],
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
            'updated_at' => 'Updated At',
            'note' => 'Note',
        ];
    }
}
