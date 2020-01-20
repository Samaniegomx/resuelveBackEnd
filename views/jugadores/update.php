<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Jugadores */

$this->title = 'Actualizar Jugador: ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Jugadores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre, 'url' => ['view', 'id' => $model->id_jugadores]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="jugadores-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
