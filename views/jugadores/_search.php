<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JugadoresSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jugadores-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_jugadores') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'id_nivel') ?>

    <?= $form->field($model, 'sueldo') ?>

    <?= $form->field($model, 'bono') ?>

    <?php // echo $form->field($model, 'equipo') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reiniciar', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
