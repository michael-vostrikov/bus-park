<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%bus_model}}".
 *
 * @property integer $id
 * @property string $name
 *
 * @property DriverBusModel[] $driverBusModels
 * @property Driver[] $drivers
 */
class BusModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%bus_model}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100]
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDriverBusModels()
    {
        return $this->hasMany(DriverBusModel::className(), ['bus_model_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDrivers()
    {
        return $this->hasMany(Driver::className(), ['id' => 'driver_id'])->viaTable('{{%driver__bus_model}}', ['bus_model_id' => 'id']);
    }
}
