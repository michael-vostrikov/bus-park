<?php

namespace frontend\controllers;

use Yii;
use common\models\DriverBusModel;
use common\models\Driver;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DriverBusModelController implements the CRUD actions for DriverBusModel model.
 */
class DriverBusModelController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Creates a new DriverBusModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($driver_id)
    {
        $driverModel = $this->findDriverModel($driver_id);

        $model = new DriverBusModel();
        $model->driver_id = $driverModel->id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['driver/view', 'id' => $model->driver_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing DriverBusModel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $driver_id
     * @param integer $bus_model_id
     * @return mixed
     */
    public function actionDelete($driver_id, $bus_model_id)
    {
        $this->findModel($driver_id, $bus_model_id)->delete();

        return $this->redirect(['driver/view', 'id' => $driver_id]);
    }


    /**
     * Finds the DriverBusModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $driver_id
     * @param integer $bus_model_id
     * @return DriverBusModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($driver_id, $bus_model_id)
    {
        if (($model = DriverBusModel::findOne(['driver_id' => $driver_id, 'bus_model_id' => $bus_model_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the Driver model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Driver the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findDriverModel($id)
    {
        if (($model = Driver::findOne(['id' => $id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
