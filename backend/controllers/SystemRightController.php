<?php

namespace backend\controllers;

use Yii;
use yii\data\Pagination;
use backend\models\SystemRight;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;
use backend\services\SystemRightUrlService;
use backend\services\SystemFunctionService;
use yii\log\Logger;
/**
 * SystemRightController implements the CRUD actions for SystemRight model.
 */
class SystemRightController extends BaseController
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
     * Lists all SystemRight models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $query = SystemRight::find()->andWhere(['func_id'=>$id]);
        $pagination = new Pagination(['totalCount' =>$query->count(), 'pageSize' => '10']);
        //$models = $query->orderBy('display_order')
        $models = $query
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();
        return $this->render('index', [
            'models'=>$models,
            'pages'=>$pagination,
            'func_id'=>$id
        ]);
    }

    /**
     * Displays a single SystemRight model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $actions = $this->rightAction($model->id, $model->func_id);
//         echo json_encode($model->getAttributes());
        $result = ['model'=>$model->getAttributes(), 'actions'=>$actions];
        echo json_encode($result);
    }

    /**
     * Creates a new SystemRight model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SystemRight();
        if ($model->load(Yii::$app->request->post())) {
            $rightUrls = Yii::$app->request->post("rightUrls");
            $model->display_label = $model->right_name;
            $model->has_lef = 'n';
            $model->create_user = Yii::$app->user->identity->uname;
            $model->create_date = date('Y-m-d H:i:s');
            $model->update_user = Yii::$app->user->identity->uname;
            $model->update_date = date('Y-m-d H:i:s');
            if($model->validate() == true && $model->save()){
                $systemRightUrlService = new SystemRightUrlService();
                $c = $systemRightUrlService->saveRightUrls($rightUrls, $model->id, Yii::$app->user->identity->uname);
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
     * Updates an existing SystemRight model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $rightUrls = Yii::$app->request->post("rightUrls");
            //Yii::getLogger()->log("actionUpdate".json_encode($rightUrls), Logger::LEVEL_ERROR);
            $model->display_label = $model->right_name;
            $model->has_lef = 'n';
            $model->update_user = Yii::$app->user->identity->uname;
            $model->update_date = date('Y-m-d H:i:s');
            if($model->validate() == true && $model->save()){
                if(count($rightUrls) > 0){
                    $systemRightUrlService = new SystemRightUrlService();
                    $c = $systemRightUrlService->saveRightUrls($rightUrls, $id, Yii::$app->user->identity->uname);

                }
                
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
     * Deletes an existing SystemRight model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete(array $ids)
    {
        if(count($ids) > 0){
            $c = SystemRight::deleteAll(['in', 'id', $ids]);
            echo json_encode(array('errno'=>0, 'data'=>$c, 'msg'=>json_encode($ids)));
        }
        else{
            echo json_encode(array('errno'=>2, 'msg'=>''));
        }
    
    }

    /**
     * Finds the SystemRight model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SystemRight the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SystemRight::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function rightAction($rightId, $func_id){
        $systemRightUrls = SystemRightUrlService::findAll(['right_id'=>$rightId]);
        $rightUrls = [];
        foreach($systemRightUrls as $ru){
            $url = $ru->para_name . '/' . $ru->para_value;
            $rightUrls[$url] = true;
        }
        $fun = SystemFunctionService::findOne(array('id'=>$func_id));
        $controllerDatas = [$fun->controller];
        foreach($controllerDatas as $c){
            if(StringHelper::startsWith($c, 'backend\controllers') == true && $c != 'backend\controllers\BaseController'){
                $controllerName = substr($c, 0, strlen($c) - 10);
                $cUrl = Inflector::camel2id(StringHelper::basename($controllerName));
                $methods = get_class_methods($c);
                $rightTree = ['text'=>$c, 'selectable'=>false, 'state'=>['checked'=>false], 'type'=>'r'];
                foreach($methods as $m){
                    if($m != 'actions' && StringHelper::startsWith($m, 'action') !== false){
                        $actionName = substr($m, 6, strlen($m));
                        $aUrl = Inflector::camel2id($actionName);
                        $actionTree = ['text'=>$aUrl . "&nbsp;&nbsp;($cUrl/$aUrl)", 'c'=>$cUrl, 'a'=>$aUrl, 'selectable'=>true, 'state'=>['checked'=>false], 'type'=>'a'];
                        if(isset($rightUrls[$cUrl.'/'.$aUrl]) == true){
                            $actionTree['state']['checked'] = true;
                            $rightTree['state']['checked'] = true;
                        }
                        $rightTree['nodes'][] = $actionTree;
                    }
                }
                $rightActionData[] = $rightTree;
            }
        }
        return $rightActionData;
    }
    
    public function actionRightAction($rightId, $func_id){
        $data = $this->rightAction($rightId, $func_id);
        echo json_encode($data);
//         $systemRightUrls = SystemRightUrlService::findAll(['right_id'=>$rightId]);
//         $rightUrls = [];
//         foreach($systemRightUrls as $ru){
//             $url = $ru->para_name . '/' . $ru->para_value;
//             $rightUrls[$url] = true;
//         }
//         $fun = SystemFunctionService::findOne(array('id'=>$func_id));
//         $controllerDatas = [$fun->controller];
//         foreach($controllerDatas as $c){
//             if(StringHelper::startsWith($c, 'backend\controllers') == true && $c != 'backend\controllers\BaseController'){
//                 $controllerName = substr($c, 0, strlen($c) - 10);
//                 $cUrl = Inflector::camel2id(StringHelper::basename($controllerName));
//                 $methods = get_class_methods($c);
//                 $rightTree = ['text'=>$c, 'selectable'=>false, 'state'=>['checked'=>false], 'type'=>'r'];
//                 foreach($methods as $m){
//                     if($m != 'actions' && StringHelper::startsWith($m, 'action') !== false){
//                         $actionName = substr($m, 6, strlen($m));
//                         $aUrl = Inflector::camel2id($actionName);
//                         $actionTree = ['text'=>$aUrl . "&nbsp;&nbsp;($cUrl/$aUrl)", 'c'=>$cUrl, 'a'=>$aUrl, 'selectable'=>true, 'state'=>['checked'=>false], 'type'=>'a'];
//                         if(isset($rightUrls[$cUrl.'/'.$aUrl]) == true){
//                             $actionTree['state']['checked'] = true;
//                             $rightTree['state']['checked'] = true;
//                         }
//                         $rightTree['nodes'][] = $actionTree;
//                     }
//                 }
//                 $rightActionData[] = $rightTree;
//             }
//         }
//         echo json_encode($rightActionData);
    }
    
    public function actionRightUrl($rightId){
        $systemRightUrls = SystemRightUrlService::findAll(['right_id'=>$rightId]);
        $rightUrls = [];
        foreach($systemRightUrls as $ru){
            $url = $ru->para_name . '/' . $ru->para_value;
            $rightUrls[$url] = true;
        }
        $className = get_class($this);
        $mn = explode('\\', $className);
        array_pop($mn);
        $classNameSpace = implode('\\', $mn);
        $dir = dirname(__FILE__);
        $classfiles = glob ( $dir . "/*Controller.php" );
        $controllerDatas = [];
        foreach($classfiles as $file){
            $info = pathinfo($file);
            $controllerClass = $classNameSpace . '\\' . $info[ 'filename' ];
            $controllerDatas[$info[ 'filename' ]] = $controllerClass;
        }
        $rightActionData = [];
        foreach($controllerDatas as $c){
            if(StringHelper::startsWith($c, 'backend\controllers') == true && $c != 'backend\controllers\BaseController'){
                $controllerName = substr($c, 0, strlen($c) - 10);
                $cUrl = Inflector::camel2id(StringHelper::basename($controllerName));
                $methods = get_class_methods($c);
                $rightTree = ['text'=>$c, 'selectable'=>false, 'state'=>['checked'=>false], 'type'=>'r'];
                foreach($methods as $m){
                    if($m != 'actions' && StringHelper::startsWith($m, 'action') !== false){
                        $actionName = substr($m, 6, strlen($m));
                        $aUrl = Inflector::camel2id($actionName);
                        $actionTree = ['text'=>$aUrl . "&nbsp;&nbsp;($cUrl/$aUrl)", 'c'=>$cUrl, 'a'=>$aUrl, 'selectable'=>true, 'state'=>['checked'=>false], 'type'=>'a'];
                        if(isset($rightUrls[$cUrl.'/'.$aUrl]) == true){
                            $actionTree['state']['checked'] = true;
                            $rightTree['state']['checked'] = true;
                        }
                        $rightTree['nodes'][] = $actionTree;
                    }
                }
                $rightActionData[] = $rightTree;
            }
        }
        echo json_encode($rightActionData);
    }
    
    public function actionRightUrlSave(array $rightUrls, $rightId){
        if(count($rightUrls) > 0){
            $systemRightUrlService = new SystemRightUrlService();
            $c = $systemRightUrlService->saveRightUrls($rightUrls, $rightId, Yii::$app->user->identity->uname);
            if($c > 0){
                echo json_encode(array('errno'=>0, 'data'=>$c, 'msg'=>'保存成功'));
                return;
            }
        }
        echo json_encode(array('errno'=>2, 'data'=>'', 'msg'=>'保存失败'));
    }
}
