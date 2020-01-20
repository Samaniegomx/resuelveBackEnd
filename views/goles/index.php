<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\GolesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Goles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goles-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=> 'jugador',
                'value' => function($data) {
                    return $data->jugador->nombre;
                }
            ],
            [
                'attribute'=> 'nivel',
                'value' => function($data) {
                    return $data->jugador->nivel->nivel;
                }
            ],
            'goles',
            'fechaBono',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

    <p>
        <?= Html::a('Capturar Goles', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
