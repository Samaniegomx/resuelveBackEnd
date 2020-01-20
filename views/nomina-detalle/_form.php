<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NominaDetalle */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nomina-detalle-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_nomina')->textInput() ?>

    <?= $form->field($model, 'id_jugador')->textInput() ?>

    <?= $form->field($model, 'id_nivel')->textInput() ?>

    <?= $form->field($model, 'goles')->textInput() ?>

    <?= $form->field($model, 'sueldo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
