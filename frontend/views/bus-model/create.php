<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\BusModel */

$this->title = 'Создать модель автобуса';
$this->params['breadcrumbs'][] = ['label' => 'Модели автобусов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bus-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
