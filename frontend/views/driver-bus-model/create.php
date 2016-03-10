<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\DriverBusModel */

$this->title = 'Добавить модель автобуса';
$this->params['breadcrumbs'][] = ['label' => 'Водители', 'url' => ['driver/index']];
$this->params['breadcrumbs'][] = ['label' => $model->driver_id, 'url' => ['driver/view', 'id' => $model->driver_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="driver-bus-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
