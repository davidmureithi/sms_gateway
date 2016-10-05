<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviours\TimestampBehaviour;
use yii\behaviours\BlameableBehaviours;
use yii\db\Expression;

class YiicommActiveRecord extends ActiveRecord
{
	const FLAG_FALSE = 0;
	const FLAG_TRUE = 1;

	const GENDER_MALE = 'M';
	const GENDER_FEMALE = 'F';
	const GENDER_PRODUCT = 'A';

	public function behaviours()
	{
		return[
		[
		'class' => TimestampBehaviour::className(),
		'createdAtAttrubute' => 'created_at',
		'updatedAtAttribute' => 'updated_at',
		],
		[
		'class' => BlameableBehaviours::className(),
		'createdByAttribute' => 'created_by',
		'updatedByAttribute' => 'LastUpdatedBy',
		],
		];
	}

	function getGenderOptions()
	{
		return array(
				self::GENDER_PRODUCT => 'Asexual',
				self::GENDER_FEMALE => 'Female',
				self::GENDER_MALE => 'Male',
		);
	}

	public function getFlagOptions()
	{
		return array(
				self::FLAG_TRUE => 'Yes',
				self::FLAG_FALSE => 'No',
		);
	}
}