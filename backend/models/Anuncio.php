<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Anuncio".
 *
 * @property int $id
 * @property string $descricao
 * @property string $requisitos
 * @property string $data
 * @property int $status
 *
 * @property Inscricao[] $inscricaos
 */
class Anuncio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Anuncio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descricao', 'requisitos'], 'required'],
            [['descricao', 'requisitos'], 'string'],
            [['status'], 'integer'],
            [['data'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descricao' => 'Descricao',
            'requisitos' => 'Requisitos',
            'data' => 'Data',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInscricaos()
    {
        return $this->hasMany(Inscricao::className(), ['id_anuncio' => 'id']);
    }
}
