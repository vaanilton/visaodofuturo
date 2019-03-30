<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Cliente".
 *
 * @property int $id
 * @property int $id_utilizador
 * @property int $id_regiao
 * @property string $nome
 * @property string $sobrenome
 * @property string $estado_civil
 * @property string $sexo
 * @property int $data_nascimento
 * @property int $contacto
 * @property string $email
 * @property int $bi
 * @property int $nif
 * @property int $status
 *
 * @property Profile $utilizador
 * @property Regiao $regiao
 * @property Fatura[] $faturas
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Cliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_regiao', 'nome', 'sobrenome', 'estado_civil', 'sexo', 'data_nascimento', 'contacto', 'email', 'bi', 'nif'], 'required'],
            [['id_utilizador', 'id_regiao', 'contacto', 'bi', 'nif', 'status'], 'integer'],
            [['nome', 'sexo', 'email'], 'string', 'max' => 255],
            [['sobrenome', 'data_nascimento', 'estado_civil'], 'string', 'max' => 32],
            [['id_utilizador'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::className(), 'targetAttribute' => ['id_utilizador' => 'user_iduser']],
            [['id_regiao'], 'exist', 'skipOnError' => true, 'targetClass' => Regiao::className(), 'targetAttribute' => ['id_regiao' => 'id']],
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
            'id_regiao' => 'Regiao',
            'nome' => 'Nome',
            'sobrenome' => 'Sobrenome',
            'estado_civil' => 'Estado Civil',
            'sexo' => 'Sexo',
            'data_nascimento' => 'Data Nascimento',
            'contacto' => 'Contacto',
            'email' => 'Email',
            'bi' => 'Numero Bi',
            'nif' => 'Numero Nif',
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
    public function getRegiao()
    {
        return $this->hasOne(Regiao::className(), ['id' => 'id_regiao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFaturas()
    {
        return $this->hasMany(Fatura::className(), ['id_cliente' => 'id']);
    }
}
