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
 * @property string $endereco
 * @property int $contacto
 * @property string $email
 * @property int $estado
 *
 * @property Profile $utilizador
 * @property Regiao $regiao
 * @property Venda[] $vendas
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
            [['id_utilizador', 'id_regiao', 'nome', 'sobrenome', 'estado_civil', 'sexo', 'data_nascimento', 'contacto', 'email'], 'required'],
            [['id', 'id_utilizador', 'id_regiao', 'data_nascimento', 'contacto', 'estado'], 'integer'],
            [['nome', 'sexo', 'endereco', 'email'], 'string', 'max' => 255],
            [['sobrenome', 'estado_civil'], 'string', 'max' => 32],
            [['id'], 'unique'],
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
            'id_regiao' => 'Id Regiao',
            'nome' => 'Nome',
            'sobrenome' => 'Sobrenome',
            'estado_civil' => 'Estado Civil',
            'sexo' => 'Sexo',
            'data_nascimento' => 'Data Nascimento',
            'endereco' => 'Endereco',
            'contacto' => 'Contacto',
            'email' => 'Email',
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
    public function getRegiao()
    {
        return $this->hasOne(Regiao::className(), ['id' => 'id_regiao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendas()
    {
        return $this->hasMany(Venda::className(), ['id_cliente' => 'id']);
    }
}
