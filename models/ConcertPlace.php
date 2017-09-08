<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "my_concert_place".
 *
 * @property integer $id
 * @property string $city
 *
 * @property Date[] $dates
 */
class ConcertPlace extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'my_concert_place';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city'], 'required'],
            [['city'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city' => 'City',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDates()
    {
        return $this->hasMany(Date::className(), ['concert_place_id' => 'id']);
    }
}
