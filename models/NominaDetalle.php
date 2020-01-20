<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblnominadetalle".
 *
 * @property int $id_nominaDetalle
 * @property int $id_nomina
 * @property int $id_jugador
 * @property int $id_nivel
 * @property int $goles
 * @property string $sueldo
 * @property string $bono
 * @property string $total
 */
class NominaDetalle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblnominadetalle';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_nomina', 'id_jugador', 'id_nivel', 'goles', 'sueldo', 'bono', 'total'], 'required'],
            [['id_nomina', 'id_jugador', 'id_nivel', 'goles'], 'integer'],
            [['sueldo', 'bono', 'total'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_nominaDetalle' => 'Id Nomina Detalle',
            'id_nomina' => 'Id Nomina',
            'id_jugador' => 'Id Jugador',
            'id_nivel' => 'Id Nivel',
            'goles' => 'Goles',
            'sueldo' => 'Sueldo',
            'bono' => 'Bono',
            'total' => 'Total',
        ];
    }
}
