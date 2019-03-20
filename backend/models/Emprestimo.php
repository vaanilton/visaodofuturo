<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Emprestimo".
 *
 * @property int $id
 * @property int $id_fornecedor
 * @property int $id_utilizador
 * @property string $tipo
 * @property int $quantidade
 * @property string $data
 *
 * @property Fornecedor $fornecedor
 * @property Profile $utilizador
 */
class Emprestimo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Emprestimo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quantidade','data_devolucao', 'quantidade_monetario'], 'required'],
            [['id', 'id_fornecedor', 'id_utilizador', 'quantidade'], 'integer'],
            [['tipo'], 'string', 'max' => 32],
            [['nome', 'data', 'data_devolucao'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['id_fornecedor'], 'exist', 'skipOnError' => true, 'targetClass' => Fornecedor::className(), 'targetAttribute' => ['id_fornecedor' => 'id']],
            [['id_utilizador'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::className(), 'targetAttribute' => ['id_utilizador' => 'user_iduser']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_fornecedor' => 'Nome Fornecedor',
            'id_utilizador' => 'Utilizador',
            'tipo' => 'Tipo Emprestimo',
            'nome' => 'Nome',
            'quantidade' => 'Quantidade',
            'data' => 'Data',
            'data_devolucao' => 'Data da Liquidacao',
            'quantidade_monetario' => 'quantidade Monetario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFornecedor()
    {
        return $this->hasOne(Fornecedor::className(), ['id' => 'id_fornecedor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUtilizador()
    {
        return $this->hasOne(Profile::className(), ['user_iduser' => 'id_utilizador']);
    }
}
