<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\DriverSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="driver-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">

        <div class="col-sm-4">
            <?= $form->field($model, 'id') ?>
        </div>

        <div class="col-sm-4">
            <?= $form->field($model, 'first_name') ?>
        </div>

        <div class="col-sm-4">
            <?= $form->field($model, 'last_name') ?>
        </div>

    </div>

    <div class="row">

        <div class="col-sm-4">
            <?= $form->field($model, 'phone') ?>
        </div>

        <div class="col-sm-4">
            <?= $form->field($model, 'age') ?>
        </div>

        <div class="col-sm-4">
            <?= $form->field($model, 'is_active')->dropdownList(['1' => 'Активен', '0' => 'Неактивен'], ['prompt' => '[выбрать]']) ?>
        </div>

    </div>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
