<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblgoles".
 *
 * @property int $id_goles
 * @property int $id_jugador
 * @property int $goles
 * @property string $fechaBono
 */
class Goles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblgoles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_jugador', 'goles', 'fechaBono'], 'required'],
            [['id_jugador', 'goles'], 'integer'],
            [['fechaBono'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_goles' => 'Id Goles',
            'id_jugador' => 'Id Jugador',
            'goles' => 'Goles',
            'fechaBono' => 'Fecha Bono',
        ];
    }

    public function getJugador()
    {
        return $this->hasOne(Jugadores::className(), ['id_jugadores' => 'id_jugador']);
    }
}
