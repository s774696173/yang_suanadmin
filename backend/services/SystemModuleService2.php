<?php
namespace backend\services;
use Yii;
class SystemModuleService extends BaseService
{

    function __construct()
    {}
    
    /**
     * 取用户所有模块
     */
    public function getUserModuleList($userId=0)
    {
        $sql = "select module.id as mid,module.display_label as mlb,
				func.id as fid,func.display_label as flb,func.entry_url as furl,
				sru1.right_id as rid,sr.display_label as rlb,sru1.url,sru1.para_name,sru1.para_value
				from system_right_url sru1
				left outer join system_right sr on sru1.right_id=sr.id
				left outer join system_function func on sr.func_id=func.id
				left outer join system_module module on module.id=func.module_id
				where sru1.right_id in (
				select sru.right_id from system_right_url sru
				left outer join system_role_right srr on sru.right_id=srr.right_id
				left outer join system_user_role sur on sur.role_id=srr.role_id
				where 1=1 ";
    
        if($userId != 0)
        {
            $sql .= " and sur.user_id=$userId";
        }
        $sql .= " group by sru.right_id) order by module.display_order,module.id,func.display_order,func.id;";
    
        $connection = Yii::$app->db;
        $command=$connection->createCommand($sql);
        $rows=$command->queryAll();
//         $rows=$dataReader->readAll();
        return $rows;
    }
    
    /**
     * 管理员urls
     */
    public function getUserUrls($userId = 0)
    {
        $sql = "select url.* from system_right_url url
				left outer join system_role_right rrt on url.right_id=rrt.right_id
				left outer join system_user_role ru on ru.role_id=rrt.role_id
				where ru.user_id = $userId
				group by url.id ";
        $connection = Yii::$app->db;
        $command=$connection->createCommand($sql);
        $rows=$command->queryAll();
        return $rows;
    }
}

?>