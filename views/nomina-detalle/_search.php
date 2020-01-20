<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NominaDetalleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nomina-detalle-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_nominaDetalle') ?>

    <?= $form->field($model, 'id_nomina') ?>

    <?= $form->field($model, 'id_jugador') ?>

    <?= $form->field($model, 'id_nivel') ?>

    <?= $form->field($model, 'goles') ?>

    <?php // echo $form->field($model, 'sueldo') ?>

    <?php // echo $form->field($model, 'bono') ?>

    <?php // echo $form->field($model, 'total') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
