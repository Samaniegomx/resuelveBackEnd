<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Nivel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nivel-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nivel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'goles')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
