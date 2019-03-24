<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "historial_gado".
 *
 * @property int $id
 * @property int $id_gado
 * @property string $obs
 * @property int $quantidade
 * @property string $data
 *
 * @property Gado $gado
 */
class HistorialGado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'historial_gado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_gado', 'obs', 'quantidade', 'data'], 'required'],
            [['id_gado', 'quantidade'], 'integer'],
            [['obs'], 'string', 'max' => 200],
            [['data'], 'string', 'max' => 100],
            [['id'], 'unique'],
            [['id_gado'], 'exist', 'skipOnError' => true, 'targetClass' => Gado::className(), 'targetAttribute' => ['id_gado' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_gado' => 'Id Gado',
            'obs' => 'Obs',
            'quantidade' => 'Quantidade',
            'data' => 'Data',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGado()
    {
        return $this->hasOne(Gado::className(), ['id' => 'id_gado']);
    }
}
