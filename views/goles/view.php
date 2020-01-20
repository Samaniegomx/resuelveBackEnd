<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Goles */

$this->title = "Goles de: ".$model->jugador->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Goles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="goles-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'goles',
            'fechaBono',
        ],
    ]) ?>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_goles], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_goles], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Esta seguro de eliminar captura de goles?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
