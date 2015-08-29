<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $name
 * @property string $value
 * @property integer $type_product_id
 * @property string $description
 *
 * @property TypeProduct $typeProduct
 * @property Sale[] $sales
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['value'], 'number'],
            [['type_product_id'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 250],
            [['type_product_id'], 'exist', 'skipOnError' => true, 'targetClass' => TypeProduct::className(), 'targetAttribute' => ['type_product_id' => 'id']],
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
            'value' => 'Value',
            'type_product_id' => 'Type Product ID',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTypeProduct()
    {
        return $this->hasOne(TypeProduct::className(), ['id' => 'type_product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSales()
    {
        return $this->hasMany(Sale::className(), ['product_id' => 'id']);
    }
}
