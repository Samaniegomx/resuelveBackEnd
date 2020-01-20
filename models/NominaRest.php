<?php

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;

/**
 * This is the model class for table "tblenomapirest".
 *
 * @property int $id_nomapirest
 * @property string $nombre
 * @property string $nivel
 * @property int $goles
 * @property string $sueldo
 * @property string $bono
 * @property string|null $sueldo_completo
 * @property string $equipo
 */
class NominaRest extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblenomapirest';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'nivel', 'goles', 'sueldo', 'bono', 'sueldo_completo', 'equipo'], 'required'],
        ];
    }

}
