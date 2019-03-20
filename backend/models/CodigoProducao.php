<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Codigo_Producao".
 *
 * @property int $id
 * @property string $codigo
 *
 * @property Producao[] $producaos
 */
class CodigoProducao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Codigo_Producao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo'], 'required'],
            [['codigo'], 'string', 'max' => 255],
            [['codigo'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'codigo' => 'Codigo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducaos()
    {
        return $this->hasMany(Producao::className(), ['codigo_producao_id' => 'id']);
    }
}
