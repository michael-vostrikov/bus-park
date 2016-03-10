<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\DriverBusModel */

$this->title = 'Create Driver Bus Model';
$this->params['breadcrumbs'][] = ['label' => 'Driver Bus Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="driver-bus-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
