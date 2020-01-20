<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NominaDetalle */

$this->title = 'Create Nomina Detalle';
$this->params['breadcrumbs'][] = ['label' => 'Nomina Detalles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nomina-detalle-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
