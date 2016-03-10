<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DriverSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Водители';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="driver-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="panel panel-default">
        <div class="panel-heading">
            <?= Html::a(Yii::t('app', 'Фильтр'), '#filter', ['data-toggle' => 'collapse']) ?>
            <?= Html::a(Yii::t('app', 'Сбросить фильтр'), ['index'], ['class' => 'pull-right text-muted']) ?>
        </div>
        <div id="filter" class="panel-collapse collapse <?= ($searchModel->isOpen() ? 'in' : '') ?>">
            <div class="panel-body">
                <?= $this->render('_search', ['model' => $searchModel]) ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 text-right">
            <p>
                <?= Html::a('Добавить водителя', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'first_name',
            'last_name',
            'phone',
            'age',
            [
                'label' => 'Модели автобусов',
                'format' => 'html',
                'value' => function ($model) {
                    return implode('<br>', $model->getBusModels()->select('name')->column());
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Активен',
                'template' => '{toggleIsActive}',
                'buttons' => [
                    'toggleIsActive' => function ($url, $model, $key) {
                        $options = [
                            'title' => 'Активировать / Деактивировать',
                            'class' => 'toggle-is-active' . ($model->is_active ? ' active' : ''),
                            'data-url' => Url::to(['driver/toggle-is-active', 'id' => $model->id]),
                        ];
                        return Html::a('<span class="glyphicon glyphicon-ok"></span>', null, $options);
                    },
                ],
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
