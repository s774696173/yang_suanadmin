<?php
namespace backend\services;

use backend\models\SystemRightUrl;
use Yii;

class SystemRightUrlService extends SystemRightUrl
{
    public function saveRightUrls($rightUrls, $rightId, $userName)
    {
        $insertData = array();
        $date = date('Y-m-d H:i:s');
        foreach($rightUrls as $url){
//             `right_id`  `para_name` `para_value`
            $data = array('right_id'=>$rightId, 'url'=>$url['c'].'/'.$url['a'], 'para_name'=>$url['c'], 'para_value'=>$url['a'], 'create_user'=>$userName,
                'create_date'=>$date, 'update_user'=>$userName, 'update_date'=>$date);
            $insertData[] = $data;
        }
    
        $d = $this->getDb()->createCommand()->delete($this->tableName(), "right_id = $rightId ")->execute();
        //print_r($d);
        return $this->getDb()->createCommand()
        ->batchInsert($this->tableName(), [
            'right_id',
            'url',
            'para_name',
            'para_value',
            'create_user',
            'create_date',
            'update_user',
            'update_date'
        ], $insertData)
        ->execute();
    
    }
 
}
