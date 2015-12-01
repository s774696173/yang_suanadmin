<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "testlog".
 *
 * @property string $id
 * @property string $name
 * @property string $method
 * @property string $create_time
 * @property string $c1
 * @property string $c2
 * @property double $c3
 * @property string $c4
 * @property string $c5
 * @property string $c6
 * @property string $c7
 * @property integer $c8
 * @property string $c9
 * @property string $c10
 */
class Testlog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'testlog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_time', 'c2', 'c9'], 'safe'],
            [['c1'], 'required'],
            [['c3', 'c5'], 'number'],
            [['c4', 'c6', 'c10'], 'string'],
            [['c8'], 'integer'],
            [['name', 'method'], 'string', 'max' => 10],
            [['c1', 'c7'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'method' => 'Method',
            'create_time' => 'Create Time',
            'c1' => 'C1',
            'c2' => 'C2',
            'c3' => 'C3',
            'c4' => 'C4',
            'c5' => 'C5',
            'c6' => 'C6',
            'c7' => 'C7',
            'c8' => 'C8',
            'c9' => 'C9',
            'c10' => 'C10',
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
                    'comment' => '',
                    'dbType' => "bigint(20) unsigned",
                    'defaultValue' => '',
                    'enumValues' => null,
                    'isPrimaryKey' => '1',
                    'phpType' => 'string',
                    'precision' => '20',
                    'scale' => '',
                    'size' => '20',
                    'type' => 'bigint',
                    'unsigned' => '1',
                ),
                     'name' => array(
                    'name' => 'name',
                    'allowNull' => '1',
                    'autoIncrement' => '',
                    'comment' => '',
                    'dbType' => "varchar(10)",
                    'defaultValue' => '',
                    'enumValues' => null,
                    'isPrimaryKey' => '',
                    'phpType' => 'string',
                    'precision' => '10',
                    'scale' => '',
                    'size' => '10',
                    'type' => 'string',
                    'unsigned' => '',
                ),
                     'method' => array(
                    'name' => 'method',
                    'allowNull' => '1',
                    'autoIncrement' => '',
                    'comment' => '',
                    'dbType' => "varchar(10)",
                    'defaultValue' => '',
                    'enumValues' => null,
                    'isPrimaryKey' => '',
                    'phpType' => 'string',
                    'precision' => '10',
                    'scale' => '',
                    'size' => '10',
                    'type' => 'string',
                    'unsigned' => '',
                ),
                     'create_time' => array(
                    'name' => 'create_time',
                    'allowNull' => '1',
                    'autoIncrement' => '',
                    'comment' => '',
                    'dbType' => "datetime",
                    'defaultValue' => '',
                    'enumValues' => null,
                    'isPrimaryKey' => '',
                    'phpType' => 'string',
                    'precision' => '',
                    'scale' => '',
                    'size' => '',
                    'type' => 'datetime',
                    'unsigned' => '',
                ),
                     'c1' => array(
                    'name' => 'c1',
                    'allowNull' => '',
                    'autoIncrement' => '',
                    'comment' => '',
                    'dbType' => "char(1)",
                    'defaultValue' => '',
                    'enumValues' => null,
                    'isPrimaryKey' => '',
                    'phpType' => 'string',
                    'precision' => '1',
                    'scale' => '',
                    'size' => '1',
                    'type' => 'string',
                    'unsigned' => '',
                ),
                     'c2' => array(
                    'name' => 'c2',
                    'allowNull' => '1',
                    'autoIncrement' => '',
                    'comment' => '',
                    'dbType' => "date",
                    'defaultValue' => '',
                    'enumValues' => null,
                    'isPrimaryKey' => '',
                    'phpType' => 'string',
                    'precision' => '',
                    'scale' => '',
                    'size' => '',
                    'type' => 'date',
                    'unsigned' => '',
                ),
                     'c3' => array(
                    'name' => 'c3',
                    'allowNull' => '1',
                    'autoIncrement' => '',
                    'comment' => '',
                    'dbType' => "double",
                    'defaultValue' => '',
                    'enumValues' => null,
                    'isPrimaryKey' => '',
                    'phpType' => 'double',
                    'precision' => '',
                    'scale' => '',
                    'size' => '',
                    'type' => 'double',
                    'unsigned' => '',
                ),
                     'c4' => array(
                    'name' => 'c4',
                    'allowNull' => '1',
                    'autoIncrement' => '',
                    'comment' => '',
                    'dbType' => "enum('a','b','c')",
                    'defaultValue' => '',
                    'enumValues' => ["a","b","c"],
                    'isPrimaryKey' => '',
                    'phpType' => 'string',
                    'precision' => '',
                    'scale' => '',
                    'size' => '',
                    'type' => 'string',
                    'unsigned' => '',
                ),
                     'c5' => array(
                    'name' => 'c5',
                    'allowNull' => '1',
                    'autoIncrement' => '',
                    'comment' => '',
                    'dbType' => "decimal(10,0)",
                    'defaultValue' => '',
                    'enumValues' => null,
                    'isPrimaryKey' => '',
                    'phpType' => 'string',
                    'precision' => '10',
                    'scale' => '0',
                    'size' => '10',
                    'type' => 'decimal',
                    'unsigned' => '',
                ),
                     'c6' => array(
                    'name' => 'c6',
                    'allowNull' => '1',
                    'autoIncrement' => '',
                    'comment' => '',
                    'dbType' => "text",
                    'defaultValue' => '',
                    'enumValues' => null,
                    'isPrimaryKey' => '',
                    'phpType' => 'string',
                    'precision' => '',
                    'scale' => '',
                    'size' => '',
                    'type' => 'text',
                    'unsigned' => '',
                ),
                     'c7' => array(
                    'name' => 'c7',
                    'allowNull' => '1',
                    'autoIncrement' => '',
                    'comment' => '',
                    'dbType' => "binary(1)",
                    'defaultValue' => '',
                    'enumValues' => null,
                    'isPrimaryKey' => '',
                    'phpType' => 'string',
                    'precision' => '1',
                    'scale' => '',
                    'size' => '1',
                    'type' => 'string',
                    'unsigned' => '',
                ),
                     'c8' => array(
                    'name' => 'c8',
                    'allowNull' => '1',
                    'autoIncrement' => '',
                    'comment' => '',
                    'dbType' => "tinyint(1)",
                    'defaultValue' => '',
                    'enumValues' => null,
                    'isPrimaryKey' => '',
                    'phpType' => 'integer',
                    'precision' => '1',
                    'scale' => '',
                    'size' => '1',
                    'type' => 'smallint',
                    'unsigned' => '',
                ),
                     'c9' => array(
                    'name' => 'c9',
                    'allowNull' => '1',
                    'autoIncrement' => '',
                    'comment' => '',
                    'dbType' => "year(4)",
                    'defaultValue' => '',
                    'enumValues' => null,
                    'isPrimaryKey' => '',
                    'phpType' => 'string',
                    'precision' => '4',
                    'scale' => '',
                    'size' => '4',
                    'type' => 'date',
                    'unsigned' => '',
                ),
                     'c10' => array(
                    'name' => 'c10',
                    'allowNull' => '1',
                    'autoIncrement' => '',
                    'comment' => '',
                    'dbType' => "mediumblob",
                    'defaultValue' => '',
                    'enumValues' => null,
                    'isPrimaryKey' => '',
                    'phpType' => 'string',
                    'precision' => '',
                    'scale' => '',
                    'size' => '',
                    'type' => 'string',
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
