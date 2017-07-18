<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use app\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IssueSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Issues';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="issue-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Issue', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'author',
            'date',
            'description',
            'deadLine',
            [
                'attribute' => 'Исполнитель',
                'value' => 'attribute_value',
                'filter' => Html::activeDropDownList($searchModel, 'id', ArrayHelper::map(User::find()->all(), 'ID', 'username'),['class'=>'form-control','prompt' => 'Выберите исполнителя']),
            ],
            // 'active',
            // 'ready',
            // 'executor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
