<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property int $user_iduser
 * @property string $nome
 * @property string $sobrenome
 * @property string $tipo
 * @property string $sexo
 * @property int $telefone
 * @property string $data_nascimento
 * @property string $endereco
 * @property string $photo
 */
class profile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_iduser', 'nome', 'sobrenome', 'tipo', 'sexo', 'telefone', 'data_nascimento', 'endereco'], 'required'],
            [['user_iduser', 'telefone'], 'integer'],
            [['nome', 'sobrenome', 'tipo', 'sexo', 'data_nascimento', 'endereco', 'photo'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_iduser' => 'User Iduser',
            'nome' => 'Nome',
            'sobrenome' => 'Sobrenome',
            'tipo' => 'Tipo',
            'sexo' => 'Sexo',
            'telefone' => 'Telefone',
            'data_nascimento' => 'Data Nascimento',
            'endereco' => 'Endereco',
            'photo' => 'Photo',
        ];
    }
}
