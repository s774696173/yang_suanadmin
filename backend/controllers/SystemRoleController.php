<?php

namespace backend\controllers;

use Yii;
use yii\data\Pagination;
use backend\models\SystemRole;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\services\SystemRightService;
use backend\services\SystemRightUrlService;
use backend\services\SystemRoleRightService;

/**
 * SystemRoleController implements the CRUD actions for SystemRole model.
 */
class SystemRoleController extends BaseController
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
     * Lists all SystemRole models.
     * @return mixed
     */
    public function actionIndex()
    {
        $query = SystemRole::find();
        $pagination = new Pagination(['totalCount' =>$query->count(), 'pageSize' => '10']);
        //$models = $query->orderBy('display_order')
        $models = $query
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();
        return $this->render('index', [
            'models'=>$models,
            'pages'=>$pagination,
        ]);
    }

    /**
     * Displays a single SystemRole model.
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
     * Creates a new SystemRole model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SystemRole();
        if ($model->load(Yii::$app->request->post())) {
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
     * Updates an existing SystemRole model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
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
     * Deletes an existing SystemRole model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete(array $ids)
    {
        if(count($ids) > 0){
            $idsStr = implode(',', $ids);
            $c = SystemRole::deleteAll(['in', 'id', $ids]);
            echo json_encode(array('errno'=>0, 'data'=>$c, 'msg'=>json_encode($ids)));
        }
        else{
            echo json_encode(array('errno'=>2, 'msg'=>''));
        }
    
        //$this->findModel($id)->delete();

        //return $this->redirect(['index']);
    }

    /**
     * Finds the SystemRole model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SystemRole the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SystemRole::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
                    //actionDelete
    public function actionGetAllRights($roleId){

        $roleRights = SystemRoleRightService::findAll(['role_id'=>$roleId]);
        $roleRightsData = [];
        foreach($roleRights as $r){
            $roleRightsData[$r->right_id] = $r->right_id;
        }
        $systemRightService = new SystemRightService();
        //$roleRights = $systemRightService->findAll(array('role_id'=>$roleId));
        $rights = $systemRightService->getAllRight();
        $datas = array();
        foreach($rights as $r){
            //echo json_encode($r)."\n";
            $mid = $r['mid'];
            $m_name = $r['m_name'];
            $fid = $r['fid'];
            $f_name = $r['f_name'];
            $rid = $r['rid'];
            $r_name = $r['r_name'];

            $rightData = ['rid'=>$rid, 'text'=>$r_name, 'type'=>'r', 'selectable'=>false, 'state'=>['checked'=>false]];
            if(isset($roleRightsData[$rid]) == true){
                $rightData['state']['checked'] = true;
            }
            if(isset($datas[$mid]) == false){
                $moduleData = ['mid'=>$mid, 'text'=>$m_name, 'type'=>'m', 'selectable'=>false, 'state'=>['checked'=>true]];
                $datas[$mid] = $moduleData;
            }
            
            if(isset($datas[$mid]['funs'][$fid]) == false){
                $funData = ['fid'=>$fid, 'text'=>$f_name, 'type'=>'f', 'selectable'=>false, 'state'=>['checked'=>true]];
                $datas[$mid]['funs'][$fid] = $funData;
            }
            $datas[$mid]['funs'][$fid]['rights'][$rid] = $rightData;
        }
        $rightDatas = [];
        foreach($datas as $k=>$modules){
            $funs = $modules['funs'];
            foreach($funs as $f=>$fun){
                $rights = $funs[$f]['rights'];
                unset($funs[$f]['rights']);
                $rights = array_values($rights);
                $funs[$f]['nodes'] = $rights;
                // 检查当前功能下所有权限是否选中,
                foreach($rights as $r=>$right){
                    if($right['state']['checked'] == false){
                         $funs[$f]['state']['checked'] = false;
                        break;
                    }
                }
                // 判断当前模块下所有功能是否全选中
                if($datas[$k]['state']['checked'] == true && $funs[$f]['state']['checked'] == false){
                    $datas[$k]['state']['checked'] = false;
                }
            }
            unset($datas[$k]['funs']);
            $funs = array_values($funs);
            $datas[$k]['nodes']=$funs;

        }
        $datas = array_values($datas);
        
        echo json_encode($datas);

    }
    
    public function actionSaveRights(array $rids, $roleId){
       
       if(count($rids) > 0){
           $systemRoleRightService = new SystemRoleRightService();
           $count = $systemRoleRightService->saveRights($rids, $roleId, Yii::$app->user->identity->uname);
           if($count > 0){
               echo json_encode(array('errno'=>0, 'data'=>$count, 'msg'=>'保存成功'));
               return;
           }
       }
       echo json_encode(array('errno'=>2, 'data'=>'', 'msg'=>'保存失败'));
    }
}
