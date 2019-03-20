<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Produto".
 *
 * @property int $id
 * @property int $id_compra
 * @property string $nome
 * @property string $descricao
 * @property int $preco
 * @property string $photo
 * @property string $data_registo
 *
 * @property Compra $compra
 */
class Produto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Produto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_compra', 'nome', 'descricao', 'preco', 'photo', 'data_registo'], 'required'],
            [['id', 'id_compra', 'preco', 'codigo_producao_id'], 'integer'],
            [['nome', 'descricao', 'photo', 'data_registo'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['id_compra'], 'exist', 'skipOnError' => true, 'targetClass' => Compra::className(), 'targetAttribute' => ['id_compra' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_compra' => 'Id Compra',
            'nome' => 'Nome',
            'descricao' => 'Descricao',
            'preco' => 'Preco',
            'photo' => 'Photo',
            'data_registo' => 'Data Registo',
            'codigo_producao_id' => 'Codigo Producao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompra()
    {
        return $this->hasOne(Compra::className(), ['id' => 'id_compra']);
    }
}
