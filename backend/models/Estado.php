<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Estado".
 *
 * @property int $id
 * @property int $user_iduser
 * @property string $ data
 * @property string $data_hr_inicio
 * @property string $data_hr_fim
 *
 * @property User $userIduser
 */
class Estado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Estado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_iduser'], 'required'],
            [['user_iduser'], 'integer'],
            [['data', 'data_hr_inicio', 'data_hr_fim'], 'string', 'max' => 100],
            [['user_iduser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_iduser' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_iduser' => 'User Iduser',
            'data' => 'Data',
            'despositivo' => 'Despositivo',
            'data_hr_inicio' => 'Data Hr Inicio',
            'data_hr_fim' => 'Data Hr Fim',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserIduser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_iduser']);
    }
}
