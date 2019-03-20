<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Equipa".
 *
 * @property int $id
 * @property string $nome
 * @property string $sobrenome
 * @property string $tipo
 * @property string $photo
 * @property string $estado
 * @property string $estra
 * @property string $facebook
 * @property string $tweter
 */
class Equipa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Equipa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'sobrenome', 'tipo'], 'required'],
            [['id'], 'integer'],
            [['nome', 'sobrenome', 'tipo', 'photo'], 'string', 'max' => 100],
            [['estra', 'facebook', 'tweter', 'google'], 'string', 'max' => 200],
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
            'sobrenome' => 'Sobrenome',
            'tipo' => 'Cargo',
            'photo' => 'Photo',
            'estra' => 'Estra',
            'facebook' => 'Link da Pagina Facebook',
            'tweter' => 'Link da Pagina Tweter',
            'google' => 'Link da Pagina Google',
        ];
    }
}
