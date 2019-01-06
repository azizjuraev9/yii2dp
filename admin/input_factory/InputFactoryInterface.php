<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 05.01.2019
 * Time: 22:25
 */

namespace juraev\yii2dp\admin\input_factory;


use juraev\yii2dp\admin\models\Params;
use yii\widgets\ActiveField;
use yii\widgets\ActiveForm;

interface InputFactoryInterface
{

    /**
     * @param ActiveForm $form
     * @param Params $model
     * @return ActiveField
     */
    public static function get(ActiveForm $form, Params $model);

}