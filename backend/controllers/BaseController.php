<?php
namespace backend\controllers;
use Yii;
use yii\web\Controller;
use yii\web\BadRequestHttpException;
use yii\helpers\Url;
use yii\web\ForbiddenHttpException;
class BaseController extends Controller
{
    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
       
        if (parent::beforeAction($action)) {
            
//             print_r($this->id);
            //print_r($action->id);
            //echo "<br/>";
            //print_r($this->id);
            $route = $this->route;
            //$url = $this->id . '/' . $action->id;
            // 检查是否已经登录
            if(Yii::$app->user->isGuest){
                $allowUrl = ['site/index'];   
                if(in_array($route, $allowUrl) == false){
                    $this->redirect(Url::toRoute('site/index'));
                    //throw new BadRequestHttpException(Yii::t('yii', '没有权限访问'));
                    // return false;
                }
            }
            else{
                
                // 检查是否有权限
//                 $system_rights = Yii::$app->user->identity->getSystemRights();
//                 if(empty($system_rights) == false || $route == Yii::$app->homeUrl){
                    
//                 }
                //throw new ForbiddenHttpException(Yii::t('yii', '没有权限访问'));
            }
            return true;
        }
    
        return false;
    }
    

}

?>