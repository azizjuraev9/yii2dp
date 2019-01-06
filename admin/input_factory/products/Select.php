<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 04.01.2019
 * Time: 11:48
 */

namespace juraev\yii2dp\admin\input_factory\products;

use juraev\yii2dp\admin\input_factory\InputFactory;
use juraev\yii2dp\admin\input_factory\InputFactoryInterface;
use juraev\yii2dp\admin\models\Params;
use yii\widgets\ActiveForm;

class Select implements InputFactoryInterface
{

    public static function get( ActiveForm $form, Params $model)
    {
        if($data = json_decode($model->data,true))
            return $form->field($model,'['.$model->id.']val')->dropDownList($data)->label($model->title);
        return InputFactory::error($model,"Invalid JSON");
    }

}