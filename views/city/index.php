<?php

use app\models\City;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\web\JsExpression;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-index">

	<h1><?= Html::encode($this->title) ?></h1>
	
  <?php Pjax::begin(); ?>

  <?php
  $url = \yii\helpers\Url::to(['city-list']);

  echo Select2::widget([
  	'name' => 'name',
    'options' => ['placeholder' => 'Поиск ...'],
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
  ]);
  ?>

  <?php Pjax::end(); ?>

</div>
