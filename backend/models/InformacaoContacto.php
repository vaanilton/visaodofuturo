<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Informacao_Contacto".
 *
 * @property int $id
 * @property string $telefone
 * @property string $email
 * @property string $localisacao
 * @property string $hora_funcionamento
 * @property int $status
 */
class InformacaoContacto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Informacao_Contacto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['telefone', 'hora_funcionamento'], 'string', 'max' => 100],
            [['email', 'localisacao'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'telefone' => 'Telefone',
            'email' => 'Email',
            'localisacao' => 'Localisacao',
            'hora_funcionamento' => 'Hora Funcionamento',
            'status' => 'Status',
        ];
    }
}
