<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NominaDetalleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nomina Detalles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nomina-detalle-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Nomina Detalle', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_nominaDetalle',
            'id_nomina',
            'id_jugador',
            'id_nivel',
            'goles',
            //'sueldo',
            //'bono',
            //'total',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
