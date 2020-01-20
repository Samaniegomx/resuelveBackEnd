<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Nomina */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nomina-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?php
            echo '<label class="control-label">Fecha de inicio</label>';
            echo DatePicker::widget([
                'model' => $model, 
                'attribute' => 'fechaInicio',
                'options' => [
                    'placeholder' => 'Seleccione la fecha de inicio',
                    'required'=>true
                ],
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]);
        ?>
    </div>

    <div class="form-group">
        <?php
            echo '<label class="control-label">Fecha final</label>';
            echo DatePicker::widget([
                'model' => $model, 
                'attribute' => 'fechaFin',
                'options' => [
                    'placeholder' => 'Seleccione la fecha final',
                    'required'=>true
                ],
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]);
        ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
