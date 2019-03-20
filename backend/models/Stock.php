<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Stock".
 *
 * @property int $id
 * @property int $id_produto
 * @property int $id_utilizador
 * @property int $quantidade
 * @property string $data_registo
 *
 * @property Produto $produto
 * @property Profile $utilizador
 */
class Stock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Stock';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_produto', 'id_utilizador', 'quantidade', 'data_registo'], 'required'],
            [['id_produto', 'id_utilizador', 'quantidade'], 'integer'],
            [['data_registo'], 'string', 'max' => 255],
            [['id_produto'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::className(), 'targetAttribute' => ['id_produto' => 'id']],
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
            'id_produto' => 'Id Produto',
            'id_utilizador' => 'Id Utilizador',
            'quantidade' => 'Quantidade',
            'data_registo' => 'Data Registo',
        ];
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
    public function getUtilizador()
    {
        return $this->hasOne(Profile::className(), ['user_iduser' => 'id_utilizador']);
    }
}
