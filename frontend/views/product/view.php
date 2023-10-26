<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Product $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

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
            'guid',
            'type',
            'adult',
            'visibility',
            'creationTime',
            'changeTime',
            'shortDescription:ntext',
            'description:ntext',
            'metaDescription',
            'name',
            'metaTitle',
            'xmlFeedName',
            'additionalName',
            'internalNote',
            'allowIPlatba',
            'allowOnlinePayments',
            'sizeIdName',
            'voteCount',
            'voteAverageScore',
            'conditionGrade',
            'conditionDescription',
            'defaultCategory',
            'supplier',
            'brand',
            'url:url',
            'atypicalBilling',
            'atypicalShipping',
            'variants',
        ],
    ]) ?>

</div>
