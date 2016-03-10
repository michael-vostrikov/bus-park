<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DriverBusModel */
/* @var $form yii\widgets\ActiveForm */

$busModels = \common\models\BusModel::find()->select(['name', 'id'])
    ->where(['not', ['in', 'id', $model->driver->getBusModels()->select('id')->column()]])
    ->indexBy('id')->column();
?>

<div class="driver-bus-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bus_model_id')->dropdownList($busModels, ['prompt' => '[выбрать]']) ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
