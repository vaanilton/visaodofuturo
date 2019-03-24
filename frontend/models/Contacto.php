<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "contacto".
 *
 * @property int $id
 * @property string $nome
 * @property string $email
 * @property string $menssage
 * @property string $contexto
 */
class Contacto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contacto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'email', 'menssage'], 'required'],
            ['email', 'email'],
            [['nome', 'email'], 'string', 'max' => 50],
            [['menssage'], 'string', 'max' => 255],
            [['contexto'], 'string', 'max' => 50],
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
            'email' => 'Email',
            'menssage' => 'Menssage',
            'contexto' => 'Contexto',
        ];
    }
}
