<?php

namespace app\controllers;

use yii\rest\ActiveController;
use yii\helpers\Json;
use Yii;
use app\models\NominaRest;
use yii\web\Response;

class CalculaController extends ActiveController
{
    
    public $modelClass = 'app\models\NominaRest';

    public function actions()
    {

        $actions = parent::actions();
        unset($actions['index'], $actions['create']);
        return $actions;

    }

    public function actionIndex()
    {
        return $this->modelClass::find()->all();
    }

    public function actionCreate()
    {

        $nivel = [
            'A' => 5,
            'B' => 10,
            'C' => 15,
            'Cuauh' => 20,
        ];

        $post = Yii::$app->request->post();

        $metaGoles = 0;
        $goles = 0;

        foreach($post as $data)
        {
            $metaGoles += $nivel[$data['nivel']];
        }

        $goles = array_sum(array_column($post, 'goles'));


        foreach($post as $data)
        {

            $calc = new NominaRest();

            if($goles >= $metaGoles)
            {
                $bonoEquipo = 50;
            }
            else
            {
                $parteBonoEquipo = $goles * 100 / $metaGoles;
                $bonoEquipo = $parteBonoEquipo * 50 / 100;
            }

            if($data['goles'] > $nivel[$data['nivel']])
            {
                $bonoIndividual = 50;
            }
            else
            {
                $parteBonoIndividual = $data['goles'] * 100 / $nivel[$data['nivel']];
                $bonoIndividual = $parteBonoIndividual * 50 / 100;
            }

            $bonoTotal = $bonoIndividual + $bonoEquipo;
            $bonoGanado = $bonoTotal * $data['bono'] / 100;

            $total = $data['sueldo'] + $bonoGanado;

            $data['sueldo_completo'] = $total;

            $calc->attributes = $data;

            $data['goles_minimos'] = $nivel[$data['nivel']];

            unset($data['nivel']);

            if($calc->save())
            {
                $datas[] = $data;
            }
            
        }

        $response["success"] = true;
        $response["message"] = "Saved Record";
        $response["data"] = $datas;
        return ($response);
    }

}
