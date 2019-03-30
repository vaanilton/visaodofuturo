<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Item".
 *
 * @property int $id
 * @property int $id_utilizador
 * @property int $id_parceiro
 * @property string $codigo
 * @property string $nome
 * @property int $iva
 * @property int $unidade_caixa
 * @property int $unidade_caixa_iva
 * @property int $preco_caixa_iva
 * @property int $preco_item
 * @property string $data_registrado
 * @property int $status
 *
 * @property Profile $utilizador
 * @property Parceiro $parceiro
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_parceiro', 'codigo', 'nome', 'preco_item', 'data_registrado'], 'required'],
            [['id_utilizador', 'id_parceiro', 'iva', 'unidade_caixa', 'unidade_caixa_iva', 'preco_caixa_iva', 'preco_item', 'status'], 'integer'],
            [['codigo', 'nome', 'data_registrado'], 'string', 'max' => 255],
            [['id_utilizador'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::className(), 'targetAttribute' => ['id_utilizador' => 'user_iduser']],
            [['id_parceiro'], 'exist', 'skipOnError' => true, 'targetClass' => Parceiro::className(), 'targetAttribute' => ['id_parceiro' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_utilizador' => 'Id Utilizador',
            'id_parceiro' => 'Parceiro',
            'codigo' => 'Codigo',
            'nome' => 'Nome',
            'iva' => 'Iva',
            'unidade_caixa' => 'Quantidade Caixa',
            'unidade_caixa_iva' => 'Quantidade Caixa Iva',
            'preco_caixa_iva' => 'Preço Por Caixa com Iva',
            'preco_item' => 'Preço Produto',
            'data_registrado' => 'Data Registrado',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUtilizador()
    {
        return $this->hasOne(Profile::className(), ['user_iduser' => 'id_utilizador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParceiro()
    {
        return $this->hasOne(Parceiro::className(), ['id' => 'id_parceiro']);
    }
}
