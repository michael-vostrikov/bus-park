<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\BusModel */

$this->title = 'Create Bus Model';
$this->params['breadcrumbs'][] = ['label' => 'Bus Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bus-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
