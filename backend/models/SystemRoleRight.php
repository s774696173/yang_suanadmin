<?php
namespace backend\models;

use Yii;

/**
 * This is the model class for table "system_role_right".
 *
 * @property integer $id
 * @property integer $role_id
 * @property integer $right_id
 * @property string $full_path
 * @property string $create_user
 * @property string $create_date
 * @property string $update_user
 * @property string $update_date
 */
class SystemRoleRight extends \backend\models\BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'system_role_right';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_id', 'right_id'], 'required'],
            [['role_id', 'right_id'], 'integer'],
            [['create_date', 'update_date'], 'safe'],
            [['full_path'], 'string', 'max' => 250],
            [['create_user', 'update_user'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '主键',
            'role_id' => '角色主键',
            'right_id' => '权限主键',
            'full_path' => '全路径',
            'create_user' => '创建人',
            'create_date' => '创建时间',
            'update_user' => '修改人',
            'update_date' => '修改时间',
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
//                         'comment' => '主键',
//                         'dbType' => "int(11)",
                        'defaultValue' => '',
                        'enumValues' => null,
                        'isPrimaryKey' => true,
                        'phpType' => 'integer',
                        'precision' => '11',
                        'scale' => '',
                        'size' => '11',
                        'type' => 'integer',
                        'unsigned' => false,
                        'label'=>$this->getAttributeLabel('id'),
                        'inputtype' => 'text',
                        'displaylist' => true,
                        'searchble' => true,
                        'readonly' => false,
                        'order' => false,
                        'udc'=>'',
                    ),
		'role_id' => array(
                        'name' => 'role_id',
                        'allowNull' => false,
//                         'autoIncrement' => false,
//                         'comment' => '角色主键',
//                         'dbType' => "int(11)",
                        'defaultValue' => '',
                        'enumValues' => null,
                        'isPrimaryKey' => false,
                        'phpType' => 'integer',
                        'precision' => '11',
                        'scale' => '',
                        'size' => '11',
                        'type' => 'integer',
                        'unsigned' => false,
                        'label'=>$this->getAttributeLabel('role_id'),
                        'inputtype' => 'text',
                        'displaylist' => true,
                        'searchble' => false,
                        'readonly' => false,
                        'order' => false,
                        'udc'=>'',
                    ),
		'right_id' => array(
                        'name' => 'right_id',
                        'allowNull' => false,
//                         'autoIncrement' => false,
//                         'comment' => '权限主键',
//                         'dbType' => "int(11)",
                        'defaultValue' => '',
                        'enumValues' => null,
                        'isPrimaryKey' => false,
                        'phpType' => 'integer',
                        'precision' => '11',
                        'scale' => '',
                        'size' => '11',
                        'type' => 'integer',
                        'unsigned' => false,
                        'label'=>$this->getAttributeLabel('right_id'),
                        'inputtype' => 'text',
                        'displaylist' => true,
                        'searchble' => false,
                        'readonly' => false,
                        'order' => false,
                        'udc'=>'',
                    ),
		'full_path' => array(
                        'name' => 'full_path',
                        'allowNull' => true,
//                         'autoIncrement' => false,
//                         'comment' => '全路径',
//                         'dbType' => "varchar(250)",
                        'defaultValue' => '',
                        'enumValues' => null,
                        'isPrimaryKey' => false,
                        'phpType' => 'string',
                        'precision' => '250',
                        'scale' => '',
                        'size' => '250',
                        'type' => 'string',
                        'unsigned' => false,
                        'label'=>$this->getAttributeLabel('full_path'),
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
//                         'comment' => '创建人',
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
//                         'comment' => '创建时间',
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
		'update_user' => array(
                        'name' => 'update_user',
                        'allowNull' => true,
//                         'autoIncrement' => false,
//                         'comment' => '修改人',
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
                        'label'=>$this->getAttributeLabel('update_user'),
                        'inputtype' => 'text',
                        'displaylist' => true,
                        'searchble' => false,
                        'readonly' => false,
                        'order' => false,
                        'udc'=>'',
                    ),
		'update_date' => array(
                        'name' => 'update_date',
                        'allowNull' => true,
//                         'autoIncrement' => false,
//                         'comment' => '修改时间',
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
                        'label'=>$this->getAttributeLabel('update_date'),
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
