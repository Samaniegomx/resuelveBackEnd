<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Productos extends ActiveRecord
{
    public $nombre;
    public $precio;
    public $descripcion;


    public static function tableName()
    {
        return 'tblproductos';
    }
}