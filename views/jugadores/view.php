<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Nivel;

/* @var $this yii\web\View */
/* @var $model app\models\Jugadores */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Jugadores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="jugadores-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute'=> 'nivel',
                'value' => function($data) {
                    return $data->nivel->nivel;
                }
            ],
            'sueldo',
            'bono',
            'equipo',
        ],
    ]) ?>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_jugadores], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_jugadores], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Esta seguro de eliminar al jugador?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
