<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ConcertPlace */

$this->title = 'Update Concert Place: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Concert Places', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="concert-place-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
