<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbljugadores".
 *
 * @property int $id_jugadores
 * @property string $nombre
 * @property int $id_nivel
 * @property string $sueldo
 * @property string $bono
 * @property string $equipo
 */
class Jugadores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbljugadores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'id_nivel', 'sueldo', 'bono', 'equipo'], 'required'],
            [['id_nivel'], 'integer'],
            [['nombre', 'sueldo', 'bono', 'equipo'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_jugadores' => 'Id Jugadores',
            'nombre' => 'Nombre',
            'id_nivel' => 'Id Nivel',
            'sueldo' => 'Sueldo',
            'bono' => 'Bono',
            'equipo' => 'Equipo',
        ];
    }

    public function getNivel()
    {
        return $this->hasOne(Nivel::className(), ['id_nivel' => 'id_nivel']);
    }
}
