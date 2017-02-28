<?php

namespace bigpaulie\social\share;

use bigpaulie\social\share\Widget;
use yii\helpers\Html;

/**
 * Class Share
 * @package bigpaulie\social\share
 */
class Share extends Widget {

    /**
     * Build the HTML
     */
    public function run() {
        echo Html::beginTag($this->tag , $this->htmlOptions);
        foreach ($this->getNetworks() as $key => $val) {
            echo $this->parseTemplate($key);
        }
        echo Html::endTag($this->tag);
    }

}
