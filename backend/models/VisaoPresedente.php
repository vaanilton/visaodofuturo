<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "visao_presedente".
 *
 * @property int $id
 * @property string $descricao
 * @property int $status
 */
class VisaoPresedente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'visao_presedente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descricao', 'nome', 'sobrenome'], 'required'],
            [['id', 'status'], 'integer'],
            [['descricao', 'nome', 'sobrenome', 'photo', 'estra'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descricao' => 'Visão Objetiva do Presidente',
            'nome' => 'Nome do Presedente',
            'sobrenome' => 'Sobrenome',
            'photo' => 'Photo do Presidente',
            'status' => 'Status',
        ];
    }
}
