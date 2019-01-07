<?php

namespace juraev\yii2dp\admin;

use Yii;
/**
 * yii2dp module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'juraev\yii2dp\admin\controllers';

    public $defaultRoute = 'params/index';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        // custom initialization code goes here
    }

    public function canCreate(){
        if(isset($this->params['creator_usernames'])){
            if(in_array(Yii::$app->user->identity->username,$this->params['creator_usernames']))
                return true;
        }elseif(isset($this->params['creator_role']))
            if(Yii::$app->user->can($this->params['creator_role']))
                return true;

        return false;
    }

    public function canEdit(){
        if(isset($this->params['editor_usernames'])){
            if(in_array(Yii::$app->user->identity->username,$this->params['editor_usernames']))
                return true;
        }elseif(isset($this->params['editor_role']))
            if(Yii::$app->user->can($this->params['editor_role']))
                return true;
        return false;
    }
}
