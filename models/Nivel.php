<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblnivel".
 *
 * @property int $id_nivel
 * @property string $nivel
 * @property int $goles
 */
class Nivel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblnivel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nivel', 'goles'], 'required'],
            [['goles'], 'integer'],
            [['nivel'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_nivel' => 'Id Nivel',
            'nivel' => 'Nivel',
            'goles' => 'Goles',
        ];
    }

    public function getNivel($model)
    {
        print_r($model->id_nivel);
        die;
        if(!$model->id_nivel)
        {
            return false;
        }
        else
        {
            return $this->find($model->id_nivel)->one();
        }
    }
}
