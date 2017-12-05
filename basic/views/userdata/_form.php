<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\userdata */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="userdata-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_fk')->textInput() ?>

    <?= $form->field($model, 'userIp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'browser')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
