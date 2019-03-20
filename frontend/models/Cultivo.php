<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "Cultivo".
 *
 * @property int $id
 * @property int $id_fornecedor
 * @property int $id_regiao
 * @property string $descricao
 * @property int $tamanho_do_solu
 * @property string $nome_do_planteio
 * @property string $data_do_planteio
 * @property string $tempo_do_cultivo
 * @property string $data_registo
 *
 * @property Fornecedor $fornecedor
 * @property Regiao $regiao
 * @property Producao[] $producaos
 */
class Cultivo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Cultivo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_fornecedor', 'id_regiao', 'descricao', 'tamanho_do_solu', 'nome_do_planteio', 'data_do_planteio', 'tempo_do_cultivo'], 'required'],
            [['id', 'id_fornecedor', 'id_regiao', 'tamanho_do_solu'], 'integer'],
            [['descricao'], 'string', 'max' => 255],
            [['nome_do_planteio', 'data_do_planteio', 'tempo_do_cultivo', 'data_registro'], 'string', 'max' => 50],
            [['id'], 'unique'],
            [['id_fornecedor'], 'exist', 'skipOnError' => true, 'targetClass' => Fornecedor::className(), 'targetAttribute' => ['id_fornecedor' => 'id']],
            [['id_regiao'], 'exist', 'skipOnError' => true, 'targetClass' => Regiao::className(), 'targetAttribute' => ['id_regiao' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_fornecedor' => 'Fornecedor',
            'id_regiao' => 'Regiao',
            'descricao' => 'Descricao',
            'tamanho_do_solu' => 'Tamanho Do Solu (m²)',
            'nome_do_planteio' => 'Nome Do Planteio',
            'data_do_planteio' => 'Data Do Planteio',
            'tempo_do_cultivo' => 'Tempo Do Cultivo',
            'data_registro' => 'Data Registo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFornecedor()
    {
        return $this->hasOne(Fornecedor::className(), ['id' => 'id_fornecedor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegiao()
    {
        return $this->hasOne(Regiao::className(), ['id' => 'id_regiao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducaos()
    {
        return $this->hasMany(Producao::className(), ['id_cultivo' => 'id']);
    }
}
