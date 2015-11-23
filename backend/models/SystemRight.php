<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "system_right".
 *
 * @property integer $id
 * @property integer $func_id
 * @property string $right_name
 * @property string $display_label
 * @property string $des
 * @property integer $display_order
 * @property string $has_lef
 * @property string $create_user
 * @property string $create_date
 * @property string $update_user
 * @property string $update_date
 *
 * @property SystemFunction $func
 * @property SystemRightUrl[] $systemRightUrls
 */
class SystemRight extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'system_right';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['func_id'], 'required'],
            [['func_id', 'display_order'], 'integer'],
            [['create_date', 'update_date'], 'safe'],
            [['right_name', 'display_label', 'des'], 'string', 'max' => 200],
            [['has_lef'], 'string', 'max' => 1],
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
            'func_id' => '功能主键',
            'right_name' => '名称',
            'display_label' => '显示名',
            'des' => '描述',
            'display_order' => '显示顺序',
            'has_lef' => '是否有子',
            'create_user' => '创建人',
            'create_date' => '创建时间',
            'update_user' => '修改人',
            'update_date' => '修改时间',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFunc()
    {
        return $this->hasOne(SystemFunction::className(), ['id' => 'func_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSystemRightUrls()
    {
        return $this->hasMany(SystemRightUrl::className(), ['right_id' => 'id']);
    }
}
