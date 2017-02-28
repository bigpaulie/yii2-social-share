<?php

namespace bigpaulie\social\share;

use yii\web\AssetBundle;

/**
 * Class FontAwesomeAsset
 * @package bigpaulie\social\share
 */
class FontAwesomeAsset extends AssetBundle {
    
    public $sourcePath = '@bower/font-awesome/';
    
    public $css = [
        'css/font-awesome.css',
    ];
    
}
