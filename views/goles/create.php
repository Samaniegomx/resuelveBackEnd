<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Goles */

$this->title = 'Capturar goles del mes';
$this->params['breadcrumbs'][] = ['label' => 'Goles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
