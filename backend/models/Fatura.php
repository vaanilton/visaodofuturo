<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Fatura".
 *
 * @property int $id
 * @property int $id_cliente
 * @property int $id_utilizador
 * @property int $numero_fatura
 * @property string $total_venda
 * @property int $status
 *
 * @property Profile $utilizador
 * @property Cliente $cliente
 */
class Fatura extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Fatura';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cliente', 'id_utilizador', 'numero_fatura', 'total_venda'], 'required'],
            [['id', 'total_venda', 'id_cliente', 'id_utilizador', 'numero_fatura', 'status'], 'integer'],
            [['data_registo'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['id_utilizador'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::className(), 'targetAttribute' => ['id_utilizador' => 'user_iduser']],
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
            'id_cliente' => 'Cliente',
            'id_utilizador' => 'Id Utilizador',
            'numero_fatura' => 'Numero Fatura',
            'total_venda' => 'Total Venda',
            'status' => 'Status',
            'data_registo' => 'Data',
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
    public function getCliente()
    {
        return $this->hasOne(Cliente::className(), ['id' => 'id_cliente']);
    }
}
