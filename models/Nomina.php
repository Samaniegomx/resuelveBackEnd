<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblnomina".
 *
 * @property int $id_nomina
 * @property string $nombre
 * @property string $fechaCreacion
 * @property string $fechaInicio
 * @property string $fechaFin
 */
class Nomina extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblnomina';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'fechaInicio', 'fechaFin'], 'required'],
            [['fechaInicio', 'fechaFin'], 'safe'],
            [['fechaCreacion'], 'default', 'value'=> date('Y-m-d')],
            [['nombre'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_nomina' => 'Id Nomina',
            'nombre' => 'Nombre',
            'fechaCreacion' => 'Fecha Creacion',
            'fechaInicio' => 'Fecha Inicio',
            'fechaFin' => 'Fecha Fin',
        ];
    }
}
