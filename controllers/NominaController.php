<?php

namespace app\controllers;

use Yii;
use app\models\Nomina;
use app\models\NominaDetalle;
use app\models\NominaSearch;
use app\models\Goles;
use app\models\Nivel;
use app\models\Jugadores;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NominaController implements the CRUD actions for Nomina model.
 */
class NominaController extends Controller
{
    public $layout = 'resuelve/resuelve';
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    // 'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Nomina models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NominaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Nomina model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Nomina model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Nomina();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('index');
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Nomina model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if($model)
        {

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id_nomina]);
            }
            
            return $this->render('update', [
                'model' => $model,
                ]);
        }
        else
        {
            Yii::$app->session->setFlash('error', 'No se encontró la nómina seleccionada');
        }
        
        return $this->redirect('index');
    }

    /**
     * Deletes an existing Nomina model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if($model)
        {
            $model->delete();
            Yii::$app->session->setFlash('success', 'Nómina eliminada correctamente!');
            
        }
        else
        {
            Yii::$app->session->setFlash('error', 'No se encontró la nómina seleccionada');
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Nomina model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Nomina the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Nomina::findOne($id)) !== null) {
            return $model;
        }

        return false;

        // throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Deletes an existing Nomina model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionCalcular($id)
    {

        $model = $this->findModel($id);
        
        if($model)
        {
            $nomDetalle = NominaDetalle::find()->where(['id_nomina' => $id])->one();

            if(!$nomDetalle)
            {

                

                $goles = Goles::find()
                    ->where(['between', 'fechaBono', "$model->fechaInicio", "$model->fechaFin" ])->all();
    
                $sumaGoles = Goles::find()
                    ->where(['between', 'fechaBono', "$model->fechaInicio", "$model->fechaFin" ])->sum('goles');
    
                $metaBonoEquipo = Goles::find()
                    ->where(['between', 'fechaBono', "$model->fechaInicio", "$model->fechaFin" ])
                    ->innerJoin('tbljugadores', 'tblgoles.id_jugador = tbljugadores.id_jugadores')
                    ->innerJoin('tblnivel', 'tblnivel.id_nivel = tbljugadores.id_nivel')
                    ->sum('tblnivel.goles');
                
                foreach($goles as $row)
                {
                    $nomDetalle = new NominaDetalle();

                    $jugador = Jugadores::findOne($row['id_jugador']);
                    $minGolesInd = Nivel::find()->select('goles')->where(['id_nivel' => $jugador['id_nivel']])->One();

                    if($sumaGoles >= $metaBonoEquipo)
                    {
                        $bonoEquipo = 50;
                    }
                    else
                    {
                        $parteBonoEquipo = $sumaGoles * 100 / $metaBonoEquipo;
                        $bonoEquipo = $parteBonoEquipo * 50 / 100;
                    }

                    if($row['goles'] > $minGolesInd['goles'])
                    {
                        $bonoIndividual = 50;
                    }
                    else
                    {
                        $parteBonoIndividual = $row['goles'] * 100 / $minGolesInd['goles'];
                        $bonoIndividual = $parteBonoIndividual * 50 / 100;
                    }

                    $bonoTotal = $bonoIndividual + $bonoEquipo;
                    $bonoGanado = $bonoTotal * $jugador['bono'] / 100;

                    $nomDetalle['id_nomina'] = $id;
                    $nomDetalle['id_jugador'] = $row['id_jugador'];
                    $nomDetalle['id_nivel'] = $jugador->id_nivel;
                    $nomDetalle['goles'] = $row['goles'];
                    $nomDetalle['sueldo'] = $jugador->sueldo;
                    $nomDetalle['bono'] = $jugador->bono;
                    $total = $jugador['sueldo'] + $bonoGanado;
                    $nomDetalle['total'] = "$total";

                    if($nomDetalle->validate())
                    {

                        $nomDetalle->save();
                    }

                }



                Yii::$app->session->setFlash('success', "Nómina calculada correctamente!.");
            }
            else
            {
                Yii::$app->session->setFlash('error', 'La nómina ya había sido calculada!');
            }
            
        }
        else
        {
            Yii::$app->session->setFlash('error', 'No se encontró la nómina seleccionada');
        }
        
        return $this->redirect('index');
        
    }
}
