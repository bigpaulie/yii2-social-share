<?php

namespace bigpaulie\social\share;

use yii\web\AssetBundle;

class FontAwesomeAsset extends AssetBundle {
    
    public $sourcePath = '@bower/font-awesome/';
    
    public $css = [
        'css/font-awesome.css',
    ];
    
}
