<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 04.01.2019
 * Time: 11:54
 */

namespace juraev\yii2dp\admin\input_factory\products;


use juraev\yii2dp\admin\input_factory\InputFactory;
use juraev\yii2dp\admin\input_factory\InputFactoryInterface;
use juraev\yii2dp\admin\models\Params;
use yii\widgets\ActiveForm;

class Checkbox implements InputFactoryInterface {


    public static function get(ActiveForm $form, Params $model)
    {
        if($data = json_decode($model->data,true))
            return $form->field($model,'['.$model->id.']val')->checkboxList($data)->label($model->title);
        return InputFactory::error($model,"Invalid JSON");
    }

}