<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JugadoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jugadores';
$this->params['breadcrumbs'][] = '/'.$this->title;
?>
<div class="jugadores-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nombre',
            [
                'attribute'=> 'nivel',
                'value' => function($data) {
                    return $data->nivel->nivel;
                }
            ],
            'sueldo',
            'bono',
            'equipo',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <p>
        <?= Html::a('Crear Jugador', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


</div>
