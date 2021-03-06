<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Client */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="client-form">

  <?php
  $form = ActiveForm::begin(); ?>

  <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'phone')->textInput() ?>

  <?= $form->field($model, 'nds')->checkbox() ?>

  <?php
  $url = \yii\helpers\Url::to(['city-list']);
  $cityName = empty($model->city_id) ? '' : $model->city->name;
  echo $form->field($model, 'city_id')->widget(Select2::className(), [
    'name' => 'city',
    'initValueText' => $cityName,
    'options' => ['placeholder' => 'Enter a city'],
    'language' => 'ru',
    'pluginOptions' => [
      'allowClear' => true,
      'minimumInputLength' => 1,
      'ajax' => [
        'url' => $url,
        'dataType' => 'json',
        'data' => new JsExpression('function(params) { return {q:params.term}; }')
      ],
      'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
      'templateResult' => new JsExpression('function(city) { return city.text; }'),
      'templateSelection' => new JsExpression('function (city) { return city.text; }'),
    ],
  ]); ?>

  <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

  <?php
  if (!empty($model->logo_id)) {
    echo Html::img('/uploads/img/' . $model->logo->name, ['style' => 'width:200px']);
    echo Html::a('X', ['/files/delete', 'id' => $model->logo_id], [
      'data' => [
        'confirm' => 'Вы уверены что хотите удалить лого?'
      ],
    ]);
  }
  echo $form->field($model, 'clientLogo')->fileInput(['class' => 'custom-file-input']); ?>

	<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
	</div>

  <?php ActiveForm::end(); ?>

</div>
