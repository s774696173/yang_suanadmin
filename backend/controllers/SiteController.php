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
            $this->layout = "main_main";
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


    public function actionLogin()
    {
        
        $username = Yii::$app->request->post('username');
        $password = Yii::$app->request->post('password');

        if(AdminUser::login($username, $password, true) == true){
            return $this->goBack();
        }
        else{
            echo 'fail';
        }

    }

    public function actionTest()
    {
//         exit('111');
//         session_start();
//         print_r(Yii::$app->session);
//         var_dump($_SESSION);
//         var_dump(Yii::$app->user->identity->getSystemMenus());
//         print_r(Yii::$app->user);
//         print_r(Yii::$app->user->id);
//         $password = '123456';
//         $hash = Yii::$app->getSecurity()->generatePasswordHash($password);
//         $hash = '$2y$13$9O6bKJieocg//oSax9fZOOuljAKarBXknqD8.RyYg60FfNjS7SoqK';
//            $hash = '$2y$13$Ay9W92ngBAGmw3NOrpJgUuo8f5n.CUNtfUyxOnp/HiPFfebb0UgjS';
//         $hash = '$2y$13$acwBLlB9tYdLEYKtbQ14TOzKt1QjqPyfM5wP4hFiaqIjbQ1yZX22G';
//         var_dump($hash);
//         $result =Yii::$app->getSecurity()->validatePassword($password, $hash);
//         var_dump($result);
        
//         $2y$13$AkWg3SY6me04fZ0q65i.YO2R55zY2TzVDseyf2GQVoQrgSQoQgP4i
//         $2y$13$AkWg3SY6me04fZ0q65i.YO2R55zY2TzVDseyf2GQVoQrgSQoQgP4i

//         print_r(Yii::$app->session['system_menus_156']);
        print_r(Yii::$app->session['system_rights_156']);
//         print_r(Yii::$app->request->headers);
//         print_r(get_class_methods('backend\controllers\SiteController'));
//            var_dump(Yii::$app->db->driverName);
//            var_dump(Yii::$app->db->createCommand('SELECT VERSION() AS v')->queryOne());
//         $system_menus_current = [];
//         if(empty(Yii::$app->request->referrer) == false){
//             $referrer = Yii::$app->request->referrer;
//             $system_menus_current = isset(Yii::$app->session['system_menus_current']) == true ? Yii::$app->session['system_menus_current'] : [];
//             $index = strpos($referrer, 'r=');
//             if($index !== false){
//                 $referrer = substr($referrer, $index + 2);
//                 $index = strpos($referrer, '&');
//                 if($index !== false){
//                     $referrer = substr($referrer, 0, $index);
//                 }
//             }
//             $system_menus_current[] = ['url'=>Yii::$app->request->referrer,'id'=>$referrer];
//         }
//         var_dump($system_menus_current);
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
