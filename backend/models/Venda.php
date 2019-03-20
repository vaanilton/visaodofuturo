<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Venda".
 *
 * @property int $id
 * @property int $id_utilizador
 * @property int $id_produto
 * @property int $id_cliente
 * @property string $descricao
 * @property int $quantidade
 * @property int $preco_total
 * @property string $data
 * @property string $estado
 *
 * @property Profile $utilizador
 * @property Produto $produto
 * @property Cliente $cliente
 */
class Venda extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Venda';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_utilizador', 'id_produto', 'id_cliente', 'descricao', 'quantidade', 'preco_total', 'data', 'estado'], 'required'],
            [['id', 'id_utilizador', 'id_produto', 'id_cliente', 'quantidade', 'preco_total'], 'integer'],
            [['descricao', 'data', 'estado'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['id_utilizador'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::className(), 'targetAttribute' => ['id_utilizador' => 'user_iduser']],
            [['id_produto'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::className(), 'targetAttribute' => ['id_produto' => 'id']],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['id_cliente' => 'id']],
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
            'id_produto' => 'Id Produto',
            'id_cliente' => 'Id Cliente',
            'descricao' => 'Descricao',
            'quantidade' => 'Quantidade',
            'preco_total' => 'Preco Total',
            'data' => 'Data',
            'estado' => 'Estado',
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
    public function getProduto()
    {
        return $this->hasOne(Produto::className(), ['id' => 'id_produto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::className(), ['id' => 'id_cliente']);
    }
}
