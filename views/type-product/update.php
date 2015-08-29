<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TypeProduct */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Type Product',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Type Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="type-product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
