<?php

use juraev\yii2dp\admin\input_factory\InputFactory;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ParamsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Params');
$this->params['breadcrumbs'][] = $this->title;

$template = '';
$right = '';
if($bs == 4)
{
    $right = 'float-right';
    $template = '<div class="card card-primary"><div class="card-header clearfix">{label}{buttons}</div><div class="card-body">{input}{error}</div></div>';
}
else
{
    $right = 'pull-right';
    $template = '<div class="panel panel-primary"><div class="panel-heading clearfix">{label}{buttons}</div><div class="panel-body">{input}{error}</div></div>';
}


?>
<div class="params-index">

    <h1 class="page-header clearfix">
        <?= Html::encode($this->title) ?>
        <?php
        if(Yii::$app->controller->module->canCreate())
             echo Html::a(Yii::t('app', 'Create Params'), ['create'], ['class' => 'btn btn-success '.$right])
        ?>

    </h1>



    <?php $form = ActiveForm::begin([
        'fieldConfig' => [
            'template' => $template,
        ],
//        'action' => Url::to(['save']),
    ]); ?>
    <?php
        foreach ($models as $model){
            $buttons = '';
            if(Yii::$app->controller->module->canCreate()){
                $buttons = "<div class='$right'>";
                $buttons .= Html::a('Update', ['update', 'id' => $model->id],['class' => 'btn btn-success btn-sm',]);
                $buttons .= " ";
                $buttons .= Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger btn-sm',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]);
                $buttons .= "</div>";
            }
            echo str_replace("{buttons}",$buttons,InputFactory::get($model->type,$form,$model));
        }
    ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
