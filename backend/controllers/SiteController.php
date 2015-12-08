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
//             var_dump($menus);
//             exit();
            return $this->render('index', [
                'system_menus' => $menus,
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
//         session_start();
//         print_r(Yii::$app->session);
//         var_dump($_SESSION);
//         var_dump(Yii::$app->user->identity->getSystemMenus());
//         print_r(Yii::$app->user->identity->menus);
//         print_r(Yii::$app->user->id);
        $password = '123456';
//         $hash = Yii::$app->getSecurity()->generatePasswordHash($password);
//         $hash = '$2y$13$9O6bKJieocg//oSax9fZOOuljAKarBXknqD8.RyYg60FfNjS7SoqK';
//            $hash = '$2y$13$Ay9W92ngBAGmw3NOrpJgUuo8f5n.CUNtfUyxOnp/HiPFfebb0UgjS';
//         $hash = '$2y$13$acwBLlB9tYdLEYKtbQ14TOzKt1QjqPyfM5wP4hFiaqIjbQ1yZX22G';
        var_dump($hash);
        $result =Yii::$app->getSecurity()->validatePassword($password, $hash);
        var_dump($result);
        
//         $2y$13$AkWg3SY6me04fZ0q65i.YO2R55zY2TzVDseyf2GQVoQrgSQoQgP4i
//         $2y$13$AkWg3SY6me04fZ0q65i.YO2R55zY2TzVDseyf2GQVoQrgSQoQgP4i
    }
    
    public function actionLogout()
    {
        Yii::$app->user->identity->clearUserSession();
        Yii::$app->user->logout();
        return $this->goHome();
    }
}
