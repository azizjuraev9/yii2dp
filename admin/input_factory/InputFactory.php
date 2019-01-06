<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 05.01.2019
 * Time: 18:57
 */

namespace juraev\yii2dp\admin\input_factory;

use juraev\yii2dp\admin\input_factory\products\Text;
use juraev\yii2dp\admin\models\Params;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

class InputFactory
{

    public static function get($type,ActiveForm $form,Params $model){
        if(class_exists('juraev\\yii2dp\\admin\\input_factory\\products\\'.$type)){
            $product = 'juraev\\yii2dp\\admin\\input_factory\\products\\'.$type;
            return $product::get($form,$model);
        }
        return Text::get($form,$model);
    }

    public static function error(Params $model,$message){
        $error = "<div class=\"panel panel-danger\"><div class=\"panel-heading clearfix\">";
        $error .= $model->title;
        $error .= "<div class='pull-right'>";
        $error .= Html::a('Update', ['update', 'id' => $model->id],['class' => 'btn btn-success btn-sm',]);
        $error .= " ";
        $error .= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-sm',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]);
        $error .= "</div>";
        $error .= "</div><div class=\"panel-body\"><h3>";
        $error .= $message;
        $error .= "</h3></div></div>";
        return $error;
    }

}