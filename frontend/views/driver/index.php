<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DriverSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Drivers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="driver-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="panel panel-default">
        <div class="panel-heading">
            <?= Html::a(Yii::t('app', 'Filter'), '#filter', ['data-toggle' => 'collapse']) ?>
            <?= Html::a(Yii::t('app', 'Reset filter'), ['index'], ['class' => 'pull-right text-muted']) ?>
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
                <?= Html::a('Create Driver', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'first_name',
            'last_name',
            'age',
            [
                'label' => 'Bus models',
                'format' => 'html',
                'value' => function ($model) {
                    return implode('<br>', $model->getBusModels()->select('name')->column());
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Active',
                'template' => '{toggleIsActive}',
                'buttons' => [
                    'toggleIsActive' => function ($url, $model, $key) {
                        $options = [
                            'title' => 'Activate / Deactivate',
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
