<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ContactSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contact Forms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-form-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Contact Form', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
//    echo '<pre>';
//    print_r($dataProvider->db);
//    echo '</pre>';

//    die();

    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'Homepage',
            'email:email',
            'text:ntext',
            'fk.userIp',
            'fk.browser',
            'date',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
