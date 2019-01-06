<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 04.01.2019
 * Time: 11:32
 */

namespace juraev\yii2dp\admin\form_factory;


use juraev\yii2dp\admin\form_factory\products\Text;
use juraev\yii2dp\admin\models\Params;
use yii\widgets\ActiveForm;

class FormFactory
{

    public static function build($type,ActiveForm $form,Params $model){
        if(class_exists('juraev\\yii2dp\\admin\\form_factory\\products\\'.$type)){
            $product = 'juraev\\yii2dp\\admin\\form_factory\\products\\'.$type;
            return $product::build($form,$model);
        }
        return Text::build($form,$model);
    }

}