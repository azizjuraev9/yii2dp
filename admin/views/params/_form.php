<?php

use juraev\yii2dp\admin\form_factory\FormFactory;
use juraev\yii2dp\admin\input_factory\InputFactory;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model \juraev\yii2dp\admin\models\Params */
/* @var $form yii\widgets\ActiveForm */
$url = $model->isNewRecord ? Url::to(['params/create']) : Url::to(['params/update','id'=>$model->id]);
?>

<div class="params-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'key')->textInput(['maxlength' => true]) ?>

    <?= InputFactory::get($model->type,$form,$model) ?>

    <?= $form->field($model, 'type')->dropDownList([
            'Text'      => 'Text',
            'Select'    => 'Select',
            'Radio'     => 'Radio',
            'Checkbox'  => 'Checkbox',
            'Model'     => 'Model',
    ],[
            'prompt' => Yii::t('app','--- Select type ---'),
//            'onchange'=>'$.pjax.reload({container: "#pjax-content", url: "'.Url::to(['params/get-form']).'", data: {type: $(this).val()}});'
            'onchange'=>'$.pjax.reload({container: "#pjax-content", url: "'.$url.'", data: {type: $(this).val()}});'
    ]) ?>
    <?php Pjax::begin([
        'id' => 'pjax-content',
        'scrollTo' => 'pjax-content',
        'timeout' => 500000,
    ]); ?>
        <?= FormFactory::build($model->type,$form,$model); ?>
    <?php Pjax::end(); ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
