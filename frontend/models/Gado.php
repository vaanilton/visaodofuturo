<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "Gado".
 *
 * @property int $id
 * @property string $nome
 * @property string $descricao
 * @property int $quantidade
 * @property string $data_registo
 * @property int $id_fornecedor
 * @property int $id_regiao
 *
 * @property Regiao $regiao
 * @property Fornecedor $fornecedor
 * @property Regiao $regiao0
 * @property Producao[] $producaos
 */
class Gado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Gado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'descricao', 'quantidade', 'data_registo', 'id_fornecedor', 'id_regiao'], 'required'],
            [['quantidade', 'id_fornecedor', 'id_regiao'], 'integer'],
            [['nome', 'photo'], 'string', 'max' => 255],
            [['descricao', 'data_registo'], 'string', 'max' => 100],
            [['id_regiao'], 'exist', 'skipOnError' => true, 'targetClass' => Regiao::className(), 'targetAttribute' => ['id_regiao' => 'id']],
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
            'nome' => 'Nome',
            'descricao' => 'Descricao',
            'quantidade' => 'Quantidade',
            'data_registo' => 'Data Registo',
            'id_fornecedor' => 'Fornecedor',
            'id_regiao' => 'Regiao',
            'photo' => 'photo',
        ];
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
    public function getFornecedor()
    {
        return $this->hasOne(Fornecedor::className(), ['id' => 'id_fornecedor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegiao0()
    {
        return $this->hasOne(Regiao::className(), ['id' => 'id_regiao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducaos()
    {
        return $this->hasMany(Producao::className(), ['id_gado' => 'id']);
    }
}
