<?php

namespace backend\controllers;

use Yii;
use backend\models\SystemFunction;
use backend\models\SystemFunctionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
/**
 * SystemFunctionController implements the CRUD actions for SystemFunction model.
 */
class SystemFunctionController extends Controller
{
//     public function behaviors()
//     {
//         return [
//             'verbs' => [
//                 'class' => VerbFilter::className(),
//                 'actions' => [
//                     'delete' => ['post'],
//                 ],
//             ],
//         ];
//     }

    /**
     * Lists all SystemFunction models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SystemFunctionSearch();
        $module_id = Yii::$app->request->post('id');
        $query = SystemFunction::find()->andWhere('module_id=:module_id', ['module_id'=>$module_id]);
        $pagination = new Pagination(['totalCount' =>$query->count(), 'pageSize' => '10']);
        $models = $query->orderBy('display_order')
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();
        //         echo "count=" . count($models);
        //         exit();
        //         return $this->render('index');
        return $this->render('index', [
            'models'=>$models,
            'pages'=>$pagination,
        ]);
        
        
//         $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

//         return $this->render('index', [
//             'searchModel' => $searchModel,
//             'dataProvider' => $dataProvider,
//         ]);
    }

    /**
     * Displays a single SystemFunction model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
//         echo "===========";
        $model = $this->findModel($id);
        echo json_encode($model->getAttributes());
//         exit();
//         Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
//         return $model->getAttributes();
        
//         return [
//             'search' => $search,
//             'code' => 100,
//         ];
    }

    /**
     * Creates a new SystemFunction model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SystemFunction();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SystemFunction model.
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

    /**
     * Deletes an existing SystemFunction model.
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
     * Finds the SystemFunction model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SystemFunction the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SystemFunction::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
