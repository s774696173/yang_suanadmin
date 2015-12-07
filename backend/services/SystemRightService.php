<?php
namespace backend\services;

use Yii;
use backend\models\SystemRight;

class SystemRightService extends SystemRight{
    public function getAllRight(){
        $sql = "SELECT m.id AS mid, m.display_label AS m_name, f.id AS fid, f.code, f.func_name AS f_name, r.id AS rid, r.display_label AS r_name FROM
        system_module m LEFT JOIN system_function f ON f.module_id = m.id
        LEFT JOIN system_right r ON r.func_id = f.id";
        $connection = Yii::$app->db;
        $command=$connection->createCommand($sql);
        $rows=$command->queryAll();
        //         $rows=$dataReader->readAll();
        return $rows;
    }
   
//     public function getRoleRight($roleId){
//         $sql = 'SELECT * FROM `system_role_right` WHERE role_id = ';
//     }
}
