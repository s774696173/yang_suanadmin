<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "basic_applications".
 *
 * @property string $id
 * @property string $code
 * @property string $name
 * @property string $url
 * @property string $authkey
 * @property integer $isencryptapidata
 */
class BasicApplications extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'basic_applications';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['isencryptapidata'], 'integer'],
            [['code'], 'string', 'max' => 30],
            [['name'], 'string', 'max' => 20],
            [['url', 'authkey'], 'string', 'max' => 255],
            [['code'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '主键',
            'code' => 'code',
            'name' => '应用名称',
            'url' => '应用url',
            'authkey' => '应用key',
            'isencryptapidata' => '是否加密给app的api返回数据',
        ];
    }

  /**
     * 返回数据库字段信息
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
        $tableColumnInfo = array(
                     'id' => array(
                    'name' => 'id',
                    'allowNull' => '',
                    'autoIncrement' => '1',
                    'comment' => '主键',
                    'dbType' => 'bigint(20) unsigned',
                    'defaultValue' => '',
                    'enumValues' => '',
                    'isPrimaryKey' => '1',
                    'phpType' => 'string',
                    'precision' => '20',
                    'scale' => '',
                    'size' => '20',
                    'type' => 'bigint',
                    'unsigned' => '1',
                ),
                     'code' => array(
                    'name' => 'code',
                    'allowNull' => '',
                    'autoIncrement' => '',
                    'comment' => 'code',
                    'dbType' => 'varchar(30)',
                    'defaultValue' => '',
                    'enumValues' => '',
                    'isPrimaryKey' => '',
                    'phpType' => 'string',
                    'precision' => '30',
                    'scale' => '',
                    'size' => '30',
                    'type' => 'string',
                    'unsigned' => '',
                ),
                     'name' => array(
                    'name' => 'name',
                    'allowNull' => '',
                    'autoIncrement' => '',
                    'comment' => '应用名称',
                    'dbType' => 'varchar(20)',
                    'defaultValue' => '',
                    'enumValues' => '',
                    'isPrimaryKey' => '',
                    'phpType' => 'string',
                    'precision' => '20',
                    'scale' => '',
                    'size' => '20',
                    'type' => 'string',
                    'unsigned' => '',
                ),
                     'url' => array(
                    'name' => 'url',
                    'allowNull' => '',
                    'autoIncrement' => '',
                    'comment' => '应用url',
                    'dbType' => 'varchar(255)',
                    'defaultValue' => '',
                    'enumValues' => '',
                    'isPrimaryKey' => '',
                    'phpType' => 'string',
                    'precision' => '255',
                    'scale' => '',
                    'size' => '255',
                    'type' => 'string',
                    'unsigned' => '',
                ),
                     'authkey' => array(
                    'name' => 'authkey',
                    'allowNull' => '',
                    'autoIncrement' => '',
                    'comment' => '应用key',
                    'dbType' => 'varchar(255)',
                    'defaultValue' => '',
                    'enumValues' => '',
                    'isPrimaryKey' => '',
                    'phpType' => 'string',
                    'precision' => '255',
                    'scale' => '',
                    'size' => '255',
                    'type' => 'string',
                    'unsigned' => '',
                ),
                     'isencryptapidata' => array(
                    'name' => 'isencryptapidata',
                    'allowNull' => '',
                    'autoIncrement' => '',
                    'comment' => '是否加密给app的api返回数据',
                    'dbType' => 'int(2)',
                    'defaultValue' => '0',
                    'enumValues' => '',
                    'isPrimaryKey' => '',
                    'phpType' => 'integer',
                    'precision' => '2',
                    'scale' => '',
                    'size' => '2',
                    'type' => 'integer',
                    'unsigned' => '',
                ),
                );
        
    }
    
/*
'code'=>array(
                'COLUMN_NAME'=>'code',
                'COLUMN_DEFAULT'=>'',
                'IS_NULLABLE'=>'NO',
                'DATA_TYPE'=>'varchar',
                'CHARACTER_MAXIMUM_LENGTH'=>'50',
                'NUMERIC_PRECISION'=>'',
                'NUMERIC_SCALE'=>'',
                'COLUMN_TYPE'=>"varchar(50)",
                'COLUMN_KEY'=>'MUL',
                'COLUMN_COMMENT'=>array(
                    'label'=>'广告代码',
                    'inputtype'=>'select',
                    'displaylist'=>true,
                    'searchble'=>true,
                    'readonly'=>false,
                    'udc'=>'ad_code',
                )
            ),
                
$allowNull	boolean	Whether this column can be null.	yii\db\ColumnSchema
$autoIncrement	boolean	Whether this column is auto-incremental	yii\db\ColumnSchema
$comment	string	Comment of this column.	yii\db\ColumnSchema
$dbType	string	The DB type of this column.	yii\db\ColumnSchema
$defaultValue	mixed	Default value of this column	yii\db\ColumnSchema
$enumValues	array	Enumerable values.	yii\db\ColumnSchema
$isPrimaryKey	boolean	Whether this column is a primary key	yii\db\ColumnSchema
$name	string	Name of this column (without quotes).	yii\db\ColumnSchema
$phpType	string	The PHP type of this column.	yii\db\ColumnSchema
$precision	integer	Precision of the column data, if it is numeric.	yii\db\ColumnSchema
$scale	integer	Scale of the column data, if it is numeric.	yii\db\ColumnSchema
$size	integer	Display size of the column.	yii\db\ColumnSchema
$type	string	Abstract type of this column.	yii\db\ColumnSchema
$unsigned    
*/
}
