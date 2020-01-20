<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NominaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nominas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nomina-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_nomina',
            'nombre',
            'fechaCreacion',
            'fechaInicio',
            'fechaFin',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <p>
        <?= Html::a('Crear Nomina', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


</div>
