<?php

namespace backend\controllers;

use Yii;
use yii\data\Pagination;
use backend\models\SystemFunction;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\StringHelper;
use yii\helpers\Inflector;
/**
 * SystemFunctionController implements the CRUD actions for SystemFunction model.
 */
class SystemFunctionController extends BaseController
{
    /*
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
    */
    /**
     * Lists all SystemFunction models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $controllers = $this->getAllController();
        $controllerData = array();
        foreach($controllers as $c){
            $controllerData[$c['text']] = $c;
            
        }
        $query = SystemFunction::find()->andWhere(['module_id'=>$id]);
        $pagination = new Pagination(['totalCount' =>$query->count(), 'pageSize' => '10']);
        $models = $query
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->orderBy("display_order asc")
        ->all();
        return $this->render('index', [
            'models'=>$models,
            'pages'=>$pagination,
            'module_id'=>$id,
            'controllerData'=>$controllerData,
        ]);
    }

    /**
     * Displays a single SystemFunction model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        //$id = Yii::$app->request->post('id');
        $model = $this->findModel($id);
        echo json_encode($model->getAttributes());

    }

    /**
     * Creates a new SystemFunction model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SystemFunction();
        if ($model->load(Yii::$app->request->post())) {
            $model->display_label = $model->func_name;
            $model->entry_right_name = $model->func_name;
            $model->has_lef = 'n';
            $controllerName = substr($model->controller, 0, strlen($model->controller) - 10);
            $model->entry_url = Inflector::camel2id(StringHelper::basename($controllerName)) . '/' .$model->action;
            $model->create_user = Yii::$app->user->identity->uname;
            $model->create_date = date('Y-m-d H:i:s');
            $model->update_user = Yii::$app->user->identity->uname;
            $model->update_date = date('Y-m-d H:i:s');
            if($model->validate() == true && $model->save()){
                $msg = array('errno'=>0, 'msg'=>'保存成功');
                echo json_encode($msg);
            }
            else{
                $msg = array('errno'=>2, 'data'=>$model->getErrors());
                echo json_encode($msg);
            }
        } else {
            $msg = array('errno'=>2, 'msg'=>'数据出错');
            echo json_encode($msg);
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
        if ($model->load(Yii::$app->request->post())) {
            $model->display_label = $model->func_name;
            $model->entry_right_name = $model->func_name;
            $model->has_lef = 'n';
            $controllerName = substr($model->controller, 0, strlen($model->controller) - 10);
            $model->entry_url = Inflector::camel2id(StringHelper::basename($controllerName)) . '/' .$model->action;
            $model->update_user = Yii::$app->user->identity->uname;
            $model->update_date = date('Y-m-d H:i:s');
            if($model->validate() == true && $model->save()){
                $msg = array('errno'=>0, 'msg'=>'保存成功');
                echo json_encode($msg);
            }
            else{
                $msg = array('errno'=>2, 'data'=>$model->getErrors());
                echo json_encode($msg);
            }
        } else {
            $msg = array('errno'=>2, 'msg'=>'数据出错');
            echo json_encode($msg);
        }
    
    }

    /**
     * Deletes an existing SystemFunction model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete(array $ids)
    {
        if(count($ids) > 0){
            $c = SystemFunction::deleteAll(['in', 'id', $ids]);
            echo json_encode(array('errno'=>0, 'data'=>$c, 'msg'=>json_encode($ids)));
        }
        else{
            echo json_encode(array('errno'=>2, 'msg'=>''));
        }
    
        //$this->findModel($id)->delete();

        //return $this->redirect(['index']);
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
    
//     public function actionAllController(){
//         $controllers = $this->getAllController();
//         echo json_encode($controllers);
//     }
  
}
