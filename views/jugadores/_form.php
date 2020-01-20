<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Nivel;

/* @var $this yii\web\View */
/* @var $model app\models\Jugadores */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jugadores-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?php
        $nivel = \yii\helpers\ArrayHelper::map(Nivel::find()->all(), 'id_nivel', 'nivel');
    ?>
    <?= $form->field($model, 'id_nivel')->dropDownList($nivel, ['prompt' => 'Seleccione un nivel']) ?>

    <?= $form->field($model, 'sueldo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'equipo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
