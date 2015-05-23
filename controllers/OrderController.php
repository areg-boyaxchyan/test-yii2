<?php

namespace app\controllers;

use Yii;
use app\models\OrderDesc;
use app\models\OrderDescSearch;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderController implements the CRUD actions for OrderDesc model.
 */
class OrderController extends Controller
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
     * Lists all OrderDesc models.
     * @return mixed
     */
    public function actionOrders()
    {
        $model = new OrderDesc();
        $data = $model->find()->select('order_id')->groupBy('order_id')->asArray()->all();
        return $this->render('orders', [
            'model'=>$model,
            'data'=>$data
        ]);

    }

    public function actionIndex()
    {
        $searchModel = new OrderDescSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OrderDesc model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = new OrderDesc();
        $data = $model->find()->where(['order_id'=>$id])->asArray()->all();
        return $this->render('view', [
            'model'=>$model,
            'data'=>$data
        ]);
    }

    /**
     * Creates a new OrderDesc model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new OrderDesc();
        if(isset($_POST['OrderDesc'])) {
            $data = array();
            $data['_csrf'] = $_POST['_csrf'];
            $order_id = rand(10001,10000001);
            $data['OrderDesc'] = array();
            $insert = array();

            for ($i = 0; $i < count($_POST['OrderDesc']['price']); $i++) {
                $model = new OrderDesc();
                $data['OrderDesc']['order_id'] = (int)$order_id;
                $data['OrderDesc']['price'] = $_POST['OrderDesc']['price'][$i];
                $data['OrderDesc']['description'] = $_POST['OrderDesc']['description'][$i];
                $data['OrderDesc']['available'] = isset($_POST['OrderDesc']['available'][$i])? 1 : 0 ;
                $model->load($data);
                if(!$model->validate()){
                    return $this->render('update', [
                        'model' => $model,
                    ]);
                }
                $insert[]=$data;
            }

            foreach ($insert as $data) {
                $model = new OrderDesc();
                if (!($model->load($data) && $model->save())) {
                    return $this->render('update', [
                        'model' => $model,
                    ]);
                }
            }
            return $this->redirect(['view', 'id' => $order_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);

    }

    /**
     * Updates an existing OrderDesc model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionEdit($id)
    {

        $model = new OrderDesc();
        $data = $model->find()->where(['order_id'=>$id])->asArray()->all();

        if(isset($_POST['OrderDesc'])) {
            $order_id = $id;
            $model::deleteAll(["order_id"=>$order_id]);
            $data = array();
            $data['_csrf'] = $_POST['_csrf'];
            $data['OrderDesc'] = array();
            $insert = array();

            for ($i = 0; $i < count($_POST['OrderDesc']['price']); $i++) {
                $model = new OrderDesc();
                $data['OrderDesc']['order_id'] = (int)$order_id;
                $data['OrderDesc']['price'] = $_POST['OrderDesc']['price'][$i];
                $data['OrderDesc']['description'] = $_POST['OrderDesc']['description'][$i];
                $data['OrderDesc']['available'] = isset($_POST['OrderDesc']['available'][$i])? 1 : 0 ;
                $model->load($data);
                if(!$model->validate()){
                    return $this->render('update', [
                        'model' => $model,
                    ]);
                }
                $insert[]=$data;
            }

            foreach ($insert as $data) {
                $model = new OrderDesc();
                if (!($model->load($data) && $model->save())) {
                    return $this->render('update', [
                        'model' => $model,
                    ]);
                }
            }
            return $this->redirect(['view', 'id' => $order_id]);
        }

        return $this->render('edit', [
            'model' =>$model,
            'data'=>$data
        ]);

    }

    /**
     * Deletes an existing OrderDesc model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the OrderDesc model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return OrderDesc the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = OrderDesc::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
