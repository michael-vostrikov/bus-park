<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%driver}}".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $phone
 * @property integer $age
 * @property integer $is_active
 *
 * @property DriverBusModel[] $driverBusModels
 * @property BusModel[] $busModels
 */
class Driver extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%driver}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'phone', 'age'], 'required'],
            [['age', 'is_active'], 'integer'],
            [['first_name', 'last_name'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'phone' => 'Телефон',
            'age' => 'Возраст',
            'is_active' => 'Активен',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDriverBusModels()
    {
        return $this->hasMany(DriverBusModel::className(), ['driver_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBusModels()
    {
        return $this->hasMany(BusModel::className(), ['id' => 'bus_model_id'])->viaTable('{{%driver__bus_model}}', ['driver_id' => 'id']);
    }
}
