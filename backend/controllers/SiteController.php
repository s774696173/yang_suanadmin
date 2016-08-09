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
//     http://tarruda.github.io/bootstrap-datetimepicker/
// http://blueimp.github.io/jQuery-File-Upload/
//     http://www.oschina.net/p/bootstrap-wysihtml5
//     http://alittlecode.com/2012/04/jquery-form-validation-with-styles-from-twitter-bootstrap/

/*
https://github.com/jonmiles/bootstrap-treeview
http://www.htmleaf.com/Demo/201502141380.html
*/
    /**
     * @inheritdoc
     */
//     public function behaviors()
//     {
//         return [
//             'access' => [
//                 'class' => AccessControl::className(),
//                 'rules' => [
//                     [
//                         'actions' => ['login', 'error'],
//                         'allow' => true,
//                     ],
//                     [
//                         'actions' => ['logout', 'index'],
//                         'allow' => true,
//                         'roles' => ['@'],
//                     ],
//                 ],
//             ],
//             'verbs' => [
//                 'class' => VerbFilter::className(),
//                 'actions' => [
//                     'logout' => ['post'],
//                 ],
//             ],
//         ];
//     }

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
            //$this->layout = "main_main";
            $this->layout = "lte_main_login";
            return $this->render('login');
        }
        else{
            $menus = Yii::$app->user->identity->getSystemMenus();
            $sysInfo = [
                ['name'=> '操作系统', 'value'=>php_uname('s')],  //'value'=>php_uname('s').' '.php_uname('r').' '.php_uname('v')],
                ['name'=>'PHP版本', 'value'=>phpversion()],
                ['name'=>'Yii版本', 'value'=>Yii::getVersion()],
                ['name'=>'数据库', 'value'=>$this->getDbVersion()],
            ];
            return $this->render('index', [
                'system_menus' => $menus,
                'sysInfo'=>$sysInfo
            ]);
        }
    }
    
//     public $layout = "lte_main";
    public function actionLte()
    {
//         $this->layout = "main_main";
        $this->layout = "lte_main";
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
    
    private function getDbVersion(){
        $driverName = Yii::$app->db->driverName;
        if(strpos($driverName, 'mysql') !== false){
            $v = Yii::$app->db->createCommand('SELECT VERSION() AS v')->queryOne();
            $driverName = $driverName .'_' . $v['v'];
        }
        return $driverName;
//         Yii::$app->db->driverName
    }
}
