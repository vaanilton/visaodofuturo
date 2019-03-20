<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Area_Intervencao".
 *
 * @property int $id
 * @property string $icone
 * @property string $titulo
 * @property string $descricao
 * @property int $status
 */
class AreaIntervencao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Area_Intervencao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descricao'], 'required'],
            [['id', 'status'], 'integer'],
            [['descricao'], 'string'],
            [['icone'], 'string', 'max' => 100],
            [['titulo'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'icone' => 'Icone',
            'titulo' => 'Titulo',
            'descricao' => 'Descricao',
            'status' => 'Status',
        ];
    }
}
