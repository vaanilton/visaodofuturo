<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "Regiao".
 *
 * @property int $id
 * @property string $localidade
 * @property string $pais
 * @property string $ilha
 *
 * @property Cultivo[] $cultivos
 * @property Fornecedor[] $fornecedors
 * @property Gado[] $gados
 * @property Gado[] $gados0
 * @property Profile[] $profiles
 * @property Profile[] $profiles0
 */
class Regiao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Regiao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['localidade'], 'required'],
            [['localidade'], 'string', 'max' => 255],
            [['pais', 'ilha'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'localidade' => 'Localidade',
            'pais' => 'Pais',
            'ilha' => 'Ilha',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCultivos()
    {
        return $this->hasMany(Cultivo::className(), ['id_regiao' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFornecedors()
    {
        return $this->hasMany(Fornecedor::className(), ['id_regiao' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGados()
    {
        return $this->hasMany(Gado::className(), ['id_regiao' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGados0()
    {
        return $this->hasMany(Gado::className(), ['id_regiao' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfiles()
    {
        return $this->hasMany(Profile::className(), ['id_regiao' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfiles0()
    {
        return $this->hasMany(Profile::className(), ['id_regiao' => 'id']);
    }
}
