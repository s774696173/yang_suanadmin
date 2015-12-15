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
            if($this->verifyPermission($action) == true){
                
                return true;
            }
        }
        return false;
    }
    
    private function verifyPermission($action){
        $route = $this->route;
        // 检查是否已经登录
        if(Yii::$app->user->isGuest){
            $allowUrl = ['site/index'];
            if(in_array($route, $allowUrl) == false){
                $this->redirect(Url::toRoute('site/index'));
            }
        }
        else{
//             var_dump($route);
            if($route != 'site/index' && $route != 'site/logout'){
                $system_rights = Yii::$app->user->identity->getSystemRights();
                if(empty($system_rights) == true || empty($system_rights[$route]) == true){
                    //throw new ForbiddenHttpException(Yii::t('yii', '没有权限访问'));
                    header("Content-type: text/html; charset=utf-8");
                    exit('没有权限访问'.$route);
                }
            }
        }
        return true;
    }
}

?>