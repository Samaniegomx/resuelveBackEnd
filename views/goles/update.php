<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Goles */

$this->title = 'Actualizar captura de goles: ' . $model->id_goles;
$this->params['breadcrumbs'][] = ['label' => 'Goles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_goles, 'url' => ['view', 'id' => $model->id_goles]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="goles-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
