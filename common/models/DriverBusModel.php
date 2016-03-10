<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%driver__bus_model}}".
 *
 * @property integer $driver_id
 * @property integer $bus_model_id
 *
 * @property BusModel $busModel
 * @property Driver $driver
 */
class DriverBusModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%driver__bus_model}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['driver_id', 'bus_model_id'], 'required'],
            [['driver_id', 'bus_model_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'driver_id' => 'Водитель',
            'bus_model_id' => 'Модель автобуса',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBusModel()
    {
        return $this->hasOne(BusModel::className(), ['id' => 'bus_model_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDriver()
    {
        return $this->hasOne(Driver::className(), ['id' => 'driver_id']);
    }
}
