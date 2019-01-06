<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 04.01.2019
 * Time: 11:29
 */

namespace juraev\yii2dp\admin\form_factory;

use juraev\yii2dp\admin\models\Params;
use yii\widgets\ActiveForm;

interface FormInterface
{

    public static function build(ActiveForm $form,Params $model);

}