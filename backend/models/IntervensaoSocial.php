<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Intervensao_Social".
 *
 * @property int $id
 * @property string $photo
 * @property string $nome
 * @property string $descricao
 * @property int $status
 * @property string $estra
 */
class IntervensaoSocial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Intervensao_Social';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['descricao'], 'string'],
            [['photo', 'estra'], 'string', 'max' => 100],
            [['nome'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'photo' => 'Photo',
            'nome' => 'Nome',
            'descricao' => 'Descricao',
            'status' => 'Status',
            'estra' => 'Estra',
        ];
    }
}
