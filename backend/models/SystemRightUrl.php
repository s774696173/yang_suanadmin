<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "system_right_url".
 *
 * @property integer $id
 * @property integer $right_id
 * @property string $url
 * @property string $para_name
 * @property string $para_value
 * @property string $create_user
 * @property string $create_date
 * @property string $update_user
 * @property string $update_date
 *
 * @property SystemRight $right
 */
class SystemRightUrl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'system_right_url';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['right_id'], 'required'],
            [['right_id'], 'integer'],
            [['create_date', 'update_date'], 'safe'],
            [['url'], 'string', 'max' => 200],
            [['para_name', 'para_value'], 'string', 'max' => 40],
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
            'right_id' => 'right主键',
            'url' => 'url',
            'para_name' => '参数名',
            'para_value' => '参数值',
            'create_user' => '创建人',
            'create_date' => '创建时间',
            'update_user' => '修改人',
            'update_date' => '修改时间',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRight()
    {
        return $this->hasOne(SystemRight::className(), ['id' => 'right_id']);
    }
}
