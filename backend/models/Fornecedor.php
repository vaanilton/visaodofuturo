<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Fornecedor".
 *
 * @property int $id
 * @property int $id_utilizador
 * @property string $nome
 * @property string $sobrenome
 * @property string $estado_civil
 * @property string $sexo
 * @property int $data_nascimento
 * @property string $endereco
 * @property int $contacto
 * @property string $email
 * @property int $numero_agregado
 * @property string $grau_parentesco
 * @property string $tipo
 * @property int $status
 * @property int $id_regiao
 *
 * @property Emprestimo[] $emprestimos
 * @property Profile $utilizador
 * @property Regiao $regiao
 * @property Producao[] $producaos
 */
class Fornecedor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Fornecedor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_iduser','id_utilizador', 'nome', 'sobrenome', 'BI', 'NIF', 'estado_civil', 'sexo', 'data_nascimento', 'contacto', 'numero_agregado', 'id_regiao'], 'required'],
            [['id', 'id_utilizador', 'contacto', 'numero_agregado', 'status', 'id_regiao', 'BI', 'NIF'], 'integer'],
            [['nome', 'sexo', 'endereco', 'data_nascimento','tipo', 'photo'], 'string', 'max' => 255],
            [['sobrenome', 'estado_civil'], 'string', 'max' => 32],
            [['grau_parentesco'], 'string', 'max' => 100],
            [['user_iduser','id', 'BI', 'NIF'], 'unique'],
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
            'id_utilizador' => 'Utilizador',
            'nome' => 'Nome',
            'sobrenome' => 'Sobrenome',
            'estado_civil' => 'Estado Civil',
            'sexo' => 'Sexo',
            'data_nascimento' => 'Data Nascimento',
            'endereco' => 'Endereco',
            'contacto' => 'Contacto',
            'BI' => 'Numero BI',
            'NIF' => 'Numero NIF',
            'numero_agregado' => 'Numero Agregado',
            'grau_parentesco' => 'Grau Parentesco',
            'tipo' => 'Tipo',
            'status' => 'Status',
            'id_regiao' => 'Regiao',
            'photo' => 'Photo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmprestimos()
    {
        return $this->hasMany(Emprestimo::className(), ['id_fornecedor' => 'id']);
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
    public function getProducaos()
    {
        return $this->hasMany(Producao::className(), ['id_fornecedor' => 'id']);
    }
}
