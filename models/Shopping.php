<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shopping".
 *
 * @property integer $id
 * @property integer $material_id
 * @property string $value
 * @property string $day
 * @property integer $unity
 * @property string $description
 *
 * @property Material $material
 */
class Shopping extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shopping';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_id', 'value', 'day', 'unity', 'description'], 'required'],
            [['material_id', 'unity'], 'integer'],
            [['value'], 'number'],
            [['day'], 'safe'],
            [['description'], 'string'],
            [['material_id'], 'exist', 'skipOnError' => true, 'targetClass' => Material::className(), 'targetAttribute' => ['material_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'material_id' => 'Material ID',
            'value' => 'Value',
            'day' => 'Day',
            'unity' => 'Unity',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterial()
    {
        return $this->hasOne(Material::className(), ['id' => 'material_id']);
    }
}
