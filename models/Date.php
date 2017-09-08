<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "my_date".
 *
 * @property integer $id
 * @property string $date
 * @property integer $artist_id
 * @property integer $concert_place_id
 *
 * @property Artists $artist
 * @property ConcertPlace $concertPlace
 */
class Date extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'my_date';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'artist_id', 'concert_place_id'], 'required'],
            [['date'], 'safe'],
            [['artist_id', 'concert_place_id'], 'integer'],
            [['artist_id'], 'exist', 'skipOnError' => true, 'targetClass' => Artists::className(), 'targetAttribute' => ['artist_id' => 'id']],
            [['concert_place_id'], 'exist', 'skipOnError' => true, 'targetClass' => ConcertPlace::className(), 'targetAttribute' => ['concert_place_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'artist_id' => 'Artist ID',
            'concert_place_id' => 'Concert Place ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArtists()
    {
        return $this->hasOne(Artists::className(), ['id' => 'artist_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConcertPlace()
    {
        return $this->hasOne(ConcertPlace::className(), ['id' => 'concert_place_id']);
    }
}
