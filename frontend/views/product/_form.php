<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Product $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'guid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adult')->textInput() ?>

    <?= $form->field($model, 'visibility')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'creationTime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'changeTime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shortDescription')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'metaDescription')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'metaTitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'xmlFeedName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'additionalName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'internalNote')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'allowIPlatba')->textInput() ?>

    <?= $form->field($model, 'allowOnlinePayments')->textInput() ?>

    <?= $form->field($model, 'sizeIdName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'voteCount')->textInput() ?>

    <?= $form->field($model, 'voteAverageScore')->textInput() ?>

    <?= $form->field($model, 'conditionGrade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'conditionDescription')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'defaultCategory')->textInput() ?>

    <?= $form->field($model, 'supplier')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brand')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'atypicalBilling')->textInput() ?>

    <?= $form->field($model, 'atypicalShipping')->textInput() ?>

    <?= $form->field($model, 'variants')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
