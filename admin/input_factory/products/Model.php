<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 04.01.2019
 * Time: 11:55
 */

namespace juraev\yii2dp\admin\input_factory\products;


use juraev\yii2dp\admin\form_factory\FormInterface;
use juraev\yii2dp\admin\input_factory\InputFactory;
use juraev\yii2dp\admin\input_factory\InputFactoryInterface;
use juraev\yii2dp\admin\models\Params;
use Composer\Autoload\ClassLoader;
use Composer\Autoload\ClassMapGenerator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RegexIterator;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

class Model implements InputFactoryInterface
{

    public static function get(ActiveForm $form, Params $model)
    {
        $params = [];
        if($model->multiple)
            $params['multiple'] = true;
        if(class_exists($model->data))
            try{
                return $form->field($model,'['.$model->id.']val')->dropDownList(ArrayHelper::map(($model->data)::find()->all(),$model->model_key,$model->model_val),$params)->label($model->title);
            }catch(\Exception $e){
                return InputFactory::error($model,$e->getMessage());
            }
        return InputFactory::error($model,"Model or property is set incorrect");
    }

}