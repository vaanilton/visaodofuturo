<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Producao".
 *
 * @property int $id
 * @property int $id_cultivo
 * @property int $id_gado
 * @property string $tipo
 * @property int $quantidade_producao
 * @property int $quantidade_perda
 * @property string $data_colheita
 * @property int $preco_kilo
 *
 * @property Cultivo $cultivo
 * @property Gado $gado
 * @property CodigoProducao
 */
class Producao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Producao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quantidade_producao', 'quantidade_perda', 'data_colheita', 'preco_kilo', 'codigo_producao_id', 'designacao'], 'required'],
            [['id', 'id_cultivo', 'id_gado', 'quantidade_producao', 'quantidade_perda', 'preco_kilo'], 'integer'],
            [['tipo','photo', 'estado'], 'string', 'max' => 255],
            [['data_colheita'], 'string', 'max' => 32],
            [['id'], 'unique'],
            [['id_cultivo'], 'exist', 'skipOnError' => true, 'targetClass' => Cultivo::className(), 'targetAttribute' => ['id_cultivo' => 'id']],
            [['id_gado'], 'exist', 'skipOnError' => true, 'targetClass' => Gado::className(), 'targetAttribute' => ['id_gado' => 'id']],
            [['codigo_producao_id'], 'exist', 'skipOnError' => true, 'targetClass' => CodigoProducao::className(), 'targetAttribute' => ['codigo_producao_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_cultivo' => 'Cultivo',
            'id_gado' => 'Gado',
            'tipo' => 'Tipo',
            'designacao' => 'Designacao',
            'quantidade_producao' => 'Total Producao',
            'quantidade_perda' => 'Total Perda',
            'data_colheita' => 'Data Producao',
            'data_registo' => 'Data Registo',
            'preco_kilo' => 'Preco/unidade ',
            'codigo_producao_id' => 'Codigo Producao',
            'estado' => 'estado',
            'photo' => 'photo',
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCultivo()
    {
        return $this->hasOne(Cultivo::className(), ['id' => 'id_cultivo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGado()
    {
        return $this->hasOne(Gado::className(), ['id' => 'id_gado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodigoProducao()
    {
        return $this->hasOne(CodigoProducao::className(), ['id' => 'codigo_producao_id']);
    }
}
