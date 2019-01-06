<?php

namespace juraev\yii2dp\admin;

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
}
