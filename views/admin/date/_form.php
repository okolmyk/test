<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\Artists;
use app\models\ConcertPlace;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Date */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="date-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date')->textInput() ?>
    
    <?php  echo $form->field($model, 'artist_id')->dropDownList(Artists::find()->select(['name', 'id'])->indexBy('id')->column(), ['prompt', '']) ?>
    
    <?php  echo $form->field($model, 'concert_place_id')->dropDownList(ConcertPlace::find()->select(['city', 'id'])->indexBy('id')->column(), ['prompt', '']) ?>
  
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
