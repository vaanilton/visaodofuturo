<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Galeria".
 *
 * @property int $id
 * @property string $photo
 * @property string $estra
 * @property string $descricao
 */
class Galeria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Galeria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descricao'], 'string'],
            [['photo'], 'string', 'max' => 100],
            [['estra'], 'string', 'max' => 200],
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
            'estra' => 'Estra',
            'descricao' => 'Descricao',
        ];
    }
}
