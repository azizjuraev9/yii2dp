<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 04.01.2019
 * Time: 11:40
 */

namespace juraev\yii2dp\admin\input_factory\products;

use juraev\yii2dp\admin\input_factory\InputFactoryInterface;
use juraev\yii2dp\admin\models\Params;
use yii\widgets\ActiveForm;

class Text implements InputFactoryInterface
{

    public static function get(ActiveForm $form, Params $model)
    {
        return $form->field($model,'['.$model->id.']val')->textInput()->label($model->title);
    }

}