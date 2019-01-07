<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 30.12.2018
 * Time: 15:13
 */

namespace juraev\yii2dp;


use yii\helpers\ArrayHelper;
use juraev\yii2dp\admin\models\Params as Pmodel;

class Params
{

    private $_params;

    private static $_instance;

    private function __construct() {
        $this->_params = ArrayHelper::map(Pmodel::find()->all(),'key','val');
    }

    private function getParam($k){
        return @$this->_params[$k];
    }

    private static function getInstance(){
        if(is_null(self::$_instance))
            self::$_instance = new self();
        return self::$_instance;
    }

    public static function get($k){
        return self::getInstance()->getParam($k);
    }

}