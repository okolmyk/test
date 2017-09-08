<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "my_artists".
 *
 * @property integer $id
 * @property string $name
 * @property string $last_name
 *
 * @property Date[] $dates
 */
class Artists extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'my_artists';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'last_name'], 'required'],
            [['name', 'last_name'], 'string', 'max' => 255],
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
            'last_name' => 'Last Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDates()
    {
        return $this->hasMany(Date::className(), ['artist_id' => 'id']);
    }
}
