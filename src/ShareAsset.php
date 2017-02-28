<?php

namespace bigpaulie\social\share;

use yii\web\AssetBundle;

/**
 * Class ShareAsset
 * @package bigpaulie\social\share
 */
class ShareAsset extends AssetBundle {
    
    public $sourcePath = '@vendor/bigpaulie/yii2-social-share/src';
    
    public $js = [
        'assets/js/social-share.js',
    ];
    
    public $depends = [
        'bigpaulie\social\share\BootstrapSocialAsset',
        'bigpaulie\social\share\FontAwesomeAsset'
    ];
    
}
