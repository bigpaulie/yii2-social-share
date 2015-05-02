<?php

namespace bigpaulie\social\share;

use yii\web\AssetBundle;

class ShareAsset extends AssetBundle {
    
    public $sourcePath = '@vendor/bigpaulie/yii2-social-share/src';
    
    public $js = [
        'js/social-share.js',
    ];
    
    public $depends = [
        'bigpaulie\social\share\BootstrapSocialAsset',
        'bigpaulie\social\share\FontAwesomeAsset'
    ];
    
}
