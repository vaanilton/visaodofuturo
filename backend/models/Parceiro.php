<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Parceiro".
 *
 * @property int $id
 * @property int $id_utilizador
 * @property int $nome
 * @property string $endereco
 * @property int $nif
 * @property string $data_registro
 * @property int $status
 *
 * @property Item[] $items
 * @property Profile $utilizador
 */
class Parceiro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Parceiro';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'endereco', 'nif'], 'required'],
            [['id_utilizador', 'nif', 'status'], 'integer'],
            [['endereco', 'data_registro', 'nome', 'photo'], 'string', 'max' => 255],
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
            'id_utilizador' => 'Utilizador',
            'nome' => 'Nome Firma',
            'endereco' => 'Endereço',
            'nif' => 'Numero Nif',
            'data_registro' => 'Data Registro',
            'photo' => 'Logotipo Parceiro',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Item::className(), ['id_parceiro' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUtilizador()
    {
        return $this->hasOne(Profile::className(), ['user_iduser' => 'id_utilizador']);
    }
}
