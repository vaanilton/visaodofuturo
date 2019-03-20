<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Compra".
 *
 * @property int $id
 * @property int $id_utilizador
 * @property int $id_producao
 * @property int $quantidade
 * @property int $preco_total
 * @property string $data
 * @property string $estado
 *
 * @property Profile $utilizador
 * @property Producao $producao
 * @property Produto[] $produtos
 */
class Compra extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Compra';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quantidade', 'preco_total'], 'required'],
            [['id_utilizador', 'id_producao', 'quantidade', 'preco_total'], 'integer'],
            [['data', 'estado'], 'string', 'max' => 255],
            [['id_utilizador'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::className(), 'targetAttribute' => ['id_utilizador' => 'user_iduser']],
            [['id_producao'], 'exist', 'skipOnError' => true, 'targetClass' => Producao::className(), 'targetAttribute' => ['id_producao' => 'id']],
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
            'id_producao' => 'Id Producao',
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
    public function getProducao()
    {
        return $this->hasOne(Producao::className(), ['id' => 'id_producao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produto::className(), ['id_compra' => 'id']);
    }
}
