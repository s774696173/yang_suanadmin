<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "system_module".
 *
 * @property integer $id
 * @property string $code
 * @property string $display_label
 * @property string $has_lef
 * @property string $des
 * @property string $entry_url
 * @property integer $display_order
 * @property string $create_user
 * @property string $create_date
 * @property string $update_user
 * @property string $update_date
 *
 * @property SystemFunction[] $systemFunctions
 */
class SystemModule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'system_module';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code'], 'required'],
            [['display_order'], 'integer'],
            [['create_date', 'update_date'], 'safe'],
            [['code', 'create_user', 'update_user'], 'string', 'max' => 50],
            [['display_label'], 'string', 'max' => 200],
            [['has_lef'], 'string', 'max' => 1],
            [['des'], 'string', 'max' => 400],
            [['entry_url'], 'string', 'max' => 100]
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
            'display_label' => '显示名称',
            'has_lef' => '是否有子',
            'des' => '描述',
            'entry_url' => '入口地址',
            'display_order' => '顺序',
            'create_user' => '创建人',
            'create_date' => '创建时间',
            'update_user' => '修改人',
            'update_date' => '修改时间',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
//     public function getSystemFunctions()
//     {
//         return $this->hasMany(SystemFunction::className(), ['module_id' => 'id']);
//     }

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
    public function getTableColumnInfo()
    {
        $tableColumnInfo = array(
            'id'=>array(
                'COLUMN_NAME'=>'id',
                'COLUMN_DEFAULT'=>'',
                'IS_NULLABLE'=>'NO',
                'DATA_TYPE'=>'bigint',
                'CHARACTER_MAXIMUM_LENGTH'=>'',
                'NUMERIC_PRECISION'=>'20',
                'NUMERIC_SCALE'=>'0',
                'COLUMN_TYPE'=>"bigint(20) unsigned",
                'COLUMN_KEY'=>'PRI',
                'COLUMN_COMMENT'=>array(
                    'label'=>'主键id',
                    'inputtype'=>'text',
                    'displaylist'=>true,
                    'searchble'=>true,
                    'readonly'=>true,
                )
            ),
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
            'content'=>array(
                'COLUMN_NAME'=>'content',
                'COLUMN_DEFAULT'=>'',
                'IS_NULLABLE'=>'YES',
                'DATA_TYPE'=>'text',
                'CHARACTER_MAXIMUM_LENGTH'=>'65535',
                'NUMERIC_PRECISION'=>'',
                'NUMERIC_SCALE'=>'',
                'COLUMN_TYPE'=>"text",
                'COLUMN_KEY'=>'',
                'COLUMN_COMMENT'=>array(
                    'label'=>'广告内容',
                    'inputtype'=>'text',
                    'displaylist'=>true,
                    'searchble'=>false,
                    'readonly'=>false,
                )
            ),
    
         
        );
        return $tableColumnInfo;
    }
}
