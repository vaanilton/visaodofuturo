<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Inscricao".
 *
 * @property int $id
 * @property string $nome
 * @property string $morada
 * @property string $sexo
 * @property string $data_nascimento
 * @property string $escolaridade
 * @property int $BI
 * @property int $NIF
 * @property int $telefone
 * @property string $email
 * @property int $status
 * @property int $id_anuncio
 *
 * @property Anuncio $anuncio
 */
class Inscricao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Inscricao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'morada', 'sexo', 'data_nascimento', 'escolaridade', 'BI', 'NIF', 'telefone', 'email', 'id_anuncio'], 'required'],
            [['BI', 'NIF', 'telefone', 'status', 'id_anuncio'], 'integer'],
            [['nome', 'morada', 'sexo', 'data_nascimento', 'escolaridade', 'email'], 'string', 'max' => 100],
            [['id_anuncio'], 'exist', 'skipOnError' => true, 'targetClass' => Anuncio::className(), 'targetAttribute' => ['id_anuncio' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'morada' => 'Morada',
            'sexo' => 'Sexo',
            'data_nascimento' => 'Data Nascimento',
            'escolaridade' => 'Escolaridade',
            'BI' => 'Bi',
            'NIF' => 'Nif',
            'telefone' => 'Telefone',
            'email' => 'Email',
            'status' => 'Status',
            'id_anuncio' => 'Id Anuncio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnuncio()
    {
        return $this->hasOne(Anuncio::className(), ['id' => 'id_anuncio']);
    }
}
