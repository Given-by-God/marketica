<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\userdata */

$this->title = 'Update Userdata: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Userdatas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="userdata-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
