<?php
namespace backend\services;

use backend\models\SystemRightUrl;
use Yii;

class SystemRightUrlService extends SystemRightUrl
{

    public function saveRights($rids, $roleId, $userName)
    {
        $insertData = array();
        $date = date('Y-m-d H:i:s');
        foreach($rids as $rid){
            $data = array('role_id'=>$roleId, 'right_id'=>$rid, 'create_user'=>$userName, 
                'create_date'=>$date, 'update_user'=>$userName, 'update_date'=>$date);
            $insertData[] = $data;
        }
        Yii::$app->db->createCommand()->delete($this->tableName(), "role_id = $rid")->execute();
        Yii::$app->db->createCommand()
            ->batchInsert($this->tableName(), [
            'role_id',
            'right_id',
            'create_user',
            'create_date',
            'update_user',
            'update_date'
        ], $insertData)
            ->execute();
    }
}
