<?php

namespace juraev\yii2dp\admin\models;

use Yii;

/**
 * This is the model class for table "params".
 *
 * @property int $id
 * @property string $title
 * @property string $key
 * @property string $val
 * @property string $type
 * @property string $data
 * @property string $model_key
 * @property string $model_val
 * @property int $multiple
 */
class Params extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'params';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['key', 'type'], 'required'],
            [['data'], 'string'],
            [['val'], 'safe'],
            [['key'], 'string', 'max' => 100],
            [['title'], 'string', 'max' => 255],
            [['type', 'model_key', 'model_val'], 'string', 'max' => 50],
            [['key'], 'unique'],
            ['multiple', 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'key' => Yii::t('app', 'Key'),
            'val' => Yii::t('app', 'Val'),
            'type' => Yii::t('app', 'Type'),
            'data' => Yii::t('app', 'Data'),
            'model_key' => Yii::t('app', 'Model Key'),
            'model_val' => Yii::t('app', 'Model Val'),
            'multiple' => Yii::t('app', 'Multiple'),
        ];
    }

    public function beforeValidate()
    {
        if(is_array($this->val))
            $this->val = json_encode($this->val);
        return parent::beforeValidate(); // TODO: Change the autogenerated stub
    }

    public function afterFind()
    {
        if($arr = json_decode($this->val))
            $this->val = $arr;
        parent::afterFind(); // TODO: Change the autogenerated stub
    }
}
