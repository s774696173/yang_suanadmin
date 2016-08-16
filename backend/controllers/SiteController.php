<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use backend\models\AdminUser;
/**
 * Site controller
 */
class SiteController extends BaseController
{
    public $layout = "lte_main";
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        if(Yii::$app->user->isGuest){
            $this->layout = "lte_main_login";
            return $this->render('login');
        }
        else{
//             $this->layout = "lte_main";
            $menus = Yii::$app->user->identity->getSystemMenus();
            $sysInfo = [
                ['name'=> '操作系统', 'value'=>php_uname('s')],  //'value'=>php_uname('s').' '.php_uname('r').' '.php_uname('v')],
                ['name'=>'PHP版本', 'value'=>phpversion()],
                ['name'=>'Yii版本', 'value'=>Yii::getVersion()],
                ['name'=>'数据库', 'value'=>$this->getDbVersion()],
                ['name'=>'AdminLTE', 'value'=>'V2.3.6'],
                ['name'=>'建议和BUG', 'value'=>'http://git.oschina.net/penngo/chadmin/issues'],
            ];
            return $this->render('index', [
                'system_menus' => $menus,
                'sysInfo'=>$sysInfo
            ]);
        }
    }
 

    public function actionLte()
    {
//         $this->layout = "lte_main";
        return $this->render('lte');
    }

    public function actionLogin()
    {
        
        $username = Yii::$app->request->post('username');
        $password = Yii::$app->request->post('password');
        $rememberMe = Yii::$app->request->post('remember');
        $rememberMe = $rememberMe == 'y' ? true : false;
        if(AdminUser::login($username, $password, $rememberMe) == true){
            return $this->goBack();
        }
        else{
            echo 'fail';
        }

    }

    public function actionTest()
    {

          
    }
    
    public function actionLogout()
    {
        Yii::$app->user->identity->clearUserSession();
        Yii::$app->user->logout();
        return $this->goHome();
    }
    public function actionPsw()
    {
        return $this->render('psw');
    }
    public function actionPswSave()
    {
//         ["old_password"]=>
//         string(1) "1"
//             ["new_password"]=>
//             string(1) "1"
//                 ["confirm_password"]=>
//                 string(1) "1"
//         var_dump($_POST);
//         $msg = array('error'=>2, 'data'=>array('user_id'=>'用户不存在'));
//         echo json_encode($msg);
//         exit();
        //return $this->render('psw');
        $old_password = Yii::$app->request->post('old_password', '');
        $new_password = Yii::$app->request->post('new_password', '');
        $confirm_password = Yii::$app->request->post('confirm_password', '');
        if(empty($old_password) == true){
            $msg = array('error'=>2, 'data'=>array('old_password'=>'旧密码不正确'));
            echo json_encode($msg);
            exit();
        }
        if(empty($new_password) == true){
            $msg = array('error'=>2, 'data'=>array('new_password'=>'新密码不能为空'));
            echo json_encode($msg);
            exit();
        }
        if(empty($confirm_password) == true){
            $msg = array('error'=>2, 'data'=>array('confirm_password'=>'确认密码不能为空'));
            echo json_encode($msg);
            exit();
        }
        if($new_password != $confirm_password){
            $msg = array('error'=>2, 'data'=>array('confirm_password'=>'两次新密码不相同'));
            echo json_encode($msg);
            exit();
        }
        if(Yii::$app->user->isGuest == false){
            $user = AdminUser::findByUsername(Yii::$app->user->identity->uname);
            $old_password = Yii::$app->security->generatePasswordHash($old_password);
            if($user->password == $old_password){
                $user->password = Yii::$app->security->generatePasswordHash($new_password);
                $user->save();
                $msg = array('errno'=>0, 'msg'=>'保存成功');
                echo json_encode($msg);
            }
            else{
                $msg = array('errno'=>0, 'msg'=>'旧密码不正确'.$old_password);
                echo json_encode($msg);
            }
        }
        else{
            $msg = array('errno'=>0, 'msg'=>'请先登录');
            echo json_encode($msg);
        }
    }
    private function getDbVersion(){
        $driverName = Yii::$app->db->driverName;
        if(strpos($driverName, 'mysql') !== false){
            $v = Yii::$app->db->createCommand('SELECT VERSION() AS v')->queryOne();
            $driverName = $driverName .'_' . $v['v'];
        }
        return $driverName;
    }
}
