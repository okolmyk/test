<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Artists;
use app\models\ConcertPlace;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="date-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Date', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'date',
            
            [
				'attribute' => 'artist name',
				'value' => 'artists.name',
			],

          
        
            [
				'attribute' => 'concert place',
				'value' => 'concertPlace.city',
			],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
