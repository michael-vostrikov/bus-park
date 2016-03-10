<?php

use yii\helpers\Html;
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
                'attribute' => 'is_active',
                'value' => function ($model) {
                    return ($model->is_active ? 'Yes' : 'No');
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
