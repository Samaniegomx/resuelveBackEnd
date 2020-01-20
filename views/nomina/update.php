<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Nomina */

$this->title = 'Actualizar Nomina: ' . $model->id_nomina;
$this->params['breadcrumbs'][] = ['label' => 'Nominas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_nomina, 'url' => ['view', 'id' => $model->id_nomina]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="nomina-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
