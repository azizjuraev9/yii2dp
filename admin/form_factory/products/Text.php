<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 04.01.2019
 * Time: 11:40
 */

namespace juraev\yii2dp\admin\form_factory\products;

use juraev\yii2dp\admin\form_factory\FormInterface;
use juraev\yii2dp\admin\models\Params;
use yii\widgets\ActiveForm;

class Text implements FormInterface
{

    public static function build(ActiveForm $form, Params $model)
    {
        return '';
    }

}