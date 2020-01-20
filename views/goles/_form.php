<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Jugadores;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Goles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="goles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        $nivel = \yii\helpers\ArrayHelper::map(Jugadores::find()->all(), 'id_jugadores', 'nombre');
    ?>
    <?= $form->field($model, 'id_jugador')->dropDownList($nivel, ['prompt' => 'Seleccione un jugador'])->label('Jugador') ?>

    <?= $form->field($model, 'goles')->textInput() ?>

    <div class="form-group">
        <?php
            echo '<label class="control-label">Fecha de bono</label>';
            echo DatePicker::widget([
                'model' => $model, 
                'attribute' => 'fechaBono',
                'options' => [
                    'placeholder' => 'Seleccione la fecha del bono',
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
