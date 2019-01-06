<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 04.01.2019
 * Time: 11:55
 */

namespace juraev\yii2dp\admin\form_factory\products;


use juraev\yii2dp\admin\form_factory\FormInterface;
use juraev\yii2dp\admin\models\Params;
use Composer\Autoload\ClassLoader;
use Composer\Autoload\ClassMapGenerator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RegexIterator;
use Yii;
use yii\widgets\ActiveForm;

class Model implements FormInterface
{

    public static function build(ActiveForm $form, Params $model)
    {
        $data = [
            'common' => self::getModels(Yii::getAlias('@common/')),
            'frontend' => self::getModels(Yii::getAlias('@frontend/')),
            'backend' => self::getModels(Yii::getAlias('@backend/')),
        ];

        $fields = $form->field($model,'data')->dropDownList($data);
        $fields .= $form->field($model,'model_key')->textInput();
        $fields .= $form->field($model,'model_val')->textInput();
        $fields .= $form->field($model,'multiple')->checkbox();

        return $fields;
    }

    private static function getModels($path){
        $expression = '/(\\'.DIRECTORY_SEPARATOR.'models\\'.DIRECTORY_SEPARATOR.'\w+g*\.php)$/';
        $fqcns = array();
        $allFiles = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));
        $phpFiles = new RegexIterator($allFiles, $expression);
        foreach ($phpFiles as $phpFile) {
            $content = file_get_contents($phpFile->getRealPath());
            $tokens = token_get_all($content);
            $namespace = '';
            for ($index = 0; isset($tokens[$index]); $index++) {
                if (!isset($tokens[$index][0])) {
                    continue;
                }
                if (T_NAMESPACE === $tokens[$index][0]) {
                    $index += 2; // Skip namespace keyword and whitespace
                    while (isset($tokens[$index]) && is_array($tokens[$index])) {
                        $namespace .= $tokens[$index++][1];
                    }
                }
                if (T_CLASS === $tokens[$index][0] && T_WHITESPACE === $tokens[$index + 1][0] && T_STRING === $tokens[$index + 2][0]) {
                    $index += 2; // Skip class keyword and whitespace
                    $fqcns[$namespace.'\\'.$tokens[$index][1]] = $namespace.'\\'.$tokens[$index][1];

                    # break if you have one class per file (psr-4 compliant)
                    # otherwise you'll need to handle class constants (Foo::class)
                    break;
                }
            }
        }
        return $fqcns;
    }

}