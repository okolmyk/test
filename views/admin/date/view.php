<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Artists;
use app\models\ConcertPlace;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Date */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="date-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'date',
            [                      
				'label' => 'Artist name',
				'value' => $model->artists->name,
			],
            

            [                      
				'label' => 'Concert Place',
				'value' => $model->concertPlace->city,
			],
        ],
    ]) ?>

</div>
