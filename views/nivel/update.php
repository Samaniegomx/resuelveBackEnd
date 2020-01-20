<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Nivel */

$this->title = 'Actializar Nivel: ' . $model->id_nivel;
$this->params['breadcrumbs'][] = ['label' => 'Niveles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_nivel, 'url' => ['view', 'id' => $model->id_nivel]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="nivel-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
