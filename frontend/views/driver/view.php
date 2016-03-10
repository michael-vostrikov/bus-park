<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Driver */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Водители', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="driver-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'first_name',
            'last_name',
            'phone',
            'age',
            [
                'attribute' => 'is_active',
                'value' => ($model->is_active ? 'Да' : 'Нет'),
            ],
        ],
    ]) ?>


    <br>

    <p>
        <h3><?= 'Модели автобусов' ?></h3>
    <p>

    <p>
        <?= Html::a('Добавить модель автобуса', ['driver-bus-model/create', 'driver_id' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>


    <?php
        $dataProvider = new ActiveDataProvider([
            'query' => $model->getDriverBusModels(),
            'pagination' => [
                'defaultPageSize' => 0,
                'pageSize' => 0,
            ],
        ]);
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'busModel.name',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
                'buttons' => [
                    'delete' => function ($url, $model, $key) {
                        $url = ['driver-bus-model/delete', 'driver_id' => $model->driver_id, 'bus_model_id' => $model->bus_model_id];
                        $options = [
                            'title' => Yii::t('yii', 'Delete'),
                            'aria-label' => Yii::t('yii', 'Delete'),
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                            'data-method' => 'post',
                            'data-pjax' => '0',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, $options);
                    }
                ],
            ],
        ],
    ]); ?>


</div>
