<?php

namespace bigpaulie\social\share;

use yii\web\AssetBundle;

class BootstrapSocialAsset extends AssetBundle{
    
    public $sourcePath = '@bower/bootstrap-social/';
    
    public $css = [
        'bootstrap-social.css',
    ];
    
}
