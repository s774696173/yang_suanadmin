<?php
namespace backend\models;

use Yii;

/**
 * This is the model class for table "system_log".
 *
 * @property string $id
 * @property string $controller_id
 * @property string $action_id
 * @property string $url
 * @property string $module_name
 * @property string $func_name
 * @property string $right_name
 * @property string $client_ip
 * @property string $create_user
 * @property string $create_date
 */
class SystemLog extends \backend\models\BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'system_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_date'], 'safe'],
            [['controller_id', 'action_id'], 'string', 'max' => 20],
            [['url'], 'string', 'max' => 200],
            [['module_name', 'func_name', 'right_name', 'create_user'], 'string', 'max' => 50],
            [['client_ip'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'controller_id' => '控制器ID',
            'action_id' => '方法ID',
            'url' => '访问地址',
            'module_name' => '模块',
            'func_name' => '功能',
            'right_name' => '方法',
            'client_ip' => '客户端IP',
            'create_user' => '用户',
            'create_date' => '时间',
        ];
    }

  /**
     * 返回数据库字段信息，仅在生成CRUD时使用，如不需要生成CRUD，请注释或删除该getTableColumnInfo()代码
     * COLUMN_COMMENT可用key如下:
     * label - 显示的label
     * inputtype - 对应控件类型，包含text,select,checkbox,radio,file,password
     * displaylist - 是否显示在列表，默认不显示，两个值true、false。影响到列表的列
     * searchble - 是否可以搜索,默认不搜索，两个值true、false。影响到按那些条件搜索。
     * readonly - 是否只读,默认不是只读，两个值true、false。如果为只读，新建时则不显示；修改时，显示，但不能进行修改。
     * order - 是否排序字段。,默认不排序，两个值true、false。如果为true, 将自动产生在列表页排序中
     * udc - udc code，inputtype为select,checkbox,radio三个值时用到。
     * 特别字段：
     * id：主键。必须含有主键，统一都是id
     * create_date: 创建时间。生成的代码自动赋值
     * update_date: 修改时间。生成的代码自动赋值
     */
    public function getTableColumnInfo(){
        return array(
        'id' => array(
                        'name' => 'id',
                        'allowNull' => false,
//                         'autoIncrement' => true,
//                         'comment' => '',
//                         'dbType' => "bigint(20) unsigned",
                        'defaultValue' => '',
                        'enumValues' => null,
                        'isPrimaryKey' => true,
                        'phpType' => 'string',
                        'precision' => '20',
                        'scale' => '',
                        'size' => '20',
                        'type' => 'bigint',
                        'unsigned' => true,
                        'label'=>$this->getAttributeLabel('id'),
                        'inputtype' => 'text',
                        'displaylist' => true,
                        'searchble' => true,
                        'readonly' => false,
                        'order' => false,
                        'udc'=>'',
                    ),
		'controller_id' => array(
                        'name' => 'controller_id',
                        'allowNull' => true,
//                         'autoIncrement' => false,
//                         'comment' => '控制器ID',
//                         'dbType' => "varchar(20)",
                        'defaultValue' => '',
                        'enumValues' => null,
                        'isPrimaryKey' => false,
                        'phpType' => 'string',
                        'precision' => '20',
                        'scale' => '',
                        'size' => '20',
                        'type' => 'string',
                        'unsigned' => false,
                        'label'=>$this->getAttributeLabel('controller_id'),
                        'inputtype' => 'text',
                        'displaylist' => true,
                        'searchble' => false,
                        'readonly' => false,
                        'order' => false,
                        'udc'=>'',
                    ),
		'action_id' => array(
                        'name' => 'action_id',
                        'allowNull' => true,
//                         'autoIncrement' => false,
//                         'comment' => '方法ID',
//                         'dbType' => "varchar(20)",
                        'defaultValue' => '',
                        'enumValues' => null,
                        'isPrimaryKey' => false,
                        'phpType' => 'string',
                        'precision' => '20',
                        'scale' => '',
                        'size' => '20',
                        'type' => 'string',
                        'unsigned' => false,
                        'label'=>$this->getAttributeLabel('action_id'),
                        'inputtype' => 'text',
                        'displaylist' => true,
                        'searchble' => false,
                        'readonly' => false,
                        'order' => false,
                        'udc'=>'',
                    ),
		'url' => array(
                        'name' => 'url',
                        'allowNull' => true,
//                         'autoIncrement' => false,
//                         'comment' => '访问地址',
//                         'dbType' => "varchar(200)",
                        'defaultValue' => '',
                        'enumValues' => null,
                        'isPrimaryKey' => false,
                        'phpType' => 'string',
                        'precision' => '200',
                        'scale' => '',
                        'size' => '200',
                        'type' => 'string',
                        'unsigned' => false,
                        'label'=>$this->getAttributeLabel('url'),
                        'inputtype' => 'text',
                        'displaylist' => true,
                        'searchble' => false,
                        'readonly' => false,
                        'order' => false,
                        'udc'=>'',
                    ),
		'module_name' => array(
                        'name' => 'module_name',
                        'allowNull' => true,
//                         'autoIncrement' => false,
//                         'comment' => '模块',
//                         'dbType' => "varchar(50)",
                        'defaultValue' => '',
                        'enumValues' => null,
                        'isPrimaryKey' => false,
                        'phpType' => 'string',
                        'precision' => '50',
                        'scale' => '',
                        'size' => '50',
                        'type' => 'string',
                        'unsigned' => false,
                        'label'=>$this->getAttributeLabel('module_name'),
                        'inputtype' => 'text',
                        'displaylist' => true,
                        'searchble' => false,
                        'readonly' => false,
                        'order' => false,
                        'udc'=>'',
                    ),
		'func_name' => array(
                        'name' => 'func_name',
                        'allowNull' => true,
//                         'autoIncrement' => false,
//                         'comment' => '功能',
//                         'dbType' => "varchar(50)",
                        'defaultValue' => '',
                        'enumValues' => null,
                        'isPrimaryKey' => false,
                        'phpType' => 'string',
                        'precision' => '50',
                        'scale' => '',
                        'size' => '50',
                        'type' => 'string',
                        'unsigned' => false,
                        'label'=>$this->getAttributeLabel('func_name'),
                        'inputtype' => 'text',
                        'displaylist' => true,
                        'searchble' => false,
                        'readonly' => false,
                        'order' => false,
                        'udc'=>'',
                    ),
		'right_name' => array(
                        'name' => 'right_name',
                        'allowNull' => true,
//                         'autoIncrement' => false,
//                         'comment' => '方法',
//                         'dbType' => "varchar(50)",
                        'defaultValue' => '',
                        'enumValues' => null,
                        'isPrimaryKey' => false,
                        'phpType' => 'string',
                        'precision' => '50',
                        'scale' => '',
                        'size' => '50',
                        'type' => 'string',
                        'unsigned' => false,
                        'label'=>$this->getAttributeLabel('right_name'),
                        'inputtype' => 'text',
                        'displaylist' => true,
                        'searchble' => false,
                        'readonly' => false,
                        'order' => false,
                        'udc'=>'',
                    ),
		'client_ip' => array(
                        'name' => 'client_ip',
                        'allowNull' => true,
//                         'autoIncrement' => false,
//                         'comment' => '客户端IP',
//                         'dbType' => "varchar(15)",
                        'defaultValue' => '',
                        'enumValues' => null,
                        'isPrimaryKey' => false,
                        'phpType' => 'string',
                        'precision' => '15',
                        'scale' => '',
                        'size' => '15',
                        'type' => 'string',
                        'unsigned' => false,
                        'label'=>$this->getAttributeLabel('client_ip'),
                        'inputtype' => 'text',
                        'displaylist' => true,
                        'searchble' => false,
                        'readonly' => false,
                        'order' => false,
                        'udc'=>'',
                    ),
		'create_user' => array(
                        'name' => 'create_user',
                        'allowNull' => true,
//                         'autoIncrement' => false,
//                         'comment' => '用户',
//                         'dbType' => "varchar(50)",
                        'defaultValue' => '',
                        'enumValues' => null,
                        'isPrimaryKey' => false,
                        'phpType' => 'string',
                        'precision' => '50',
                        'scale' => '',
                        'size' => '50',
                        'type' => 'string',
                        'unsigned' => false,
                        'label'=>$this->getAttributeLabel('create_user'),
                        'inputtype' => 'text',
                        'displaylist' => true,
                        'searchble' => false,
                        'readonly' => false,
                        'order' => false,
                        'udc'=>'',
                    ),
		'create_date' => array(
                        'name' => 'create_date',
                        'allowNull' => true,
//                         'autoIncrement' => false,
//                         'comment' => '时间',
//                         'dbType' => "datetime",
                        'defaultValue' => '',
                        'enumValues' => null,
                        'isPrimaryKey' => false,
                        'phpType' => 'string',
                        'precision' => '',
                        'scale' => '',
                        'size' => '',
                        'type' => 'datetime',
                        'unsigned' => false,
                        'label'=>$this->getAttributeLabel('create_date'),
                        'inputtype' => 'text',
                        'displaylist' => true,
                        'searchble' => false,
                        'readonly' => false,
                        'order' => false,
                        'udc'=>'',
                    ),
		        );
        
    }
 
}
