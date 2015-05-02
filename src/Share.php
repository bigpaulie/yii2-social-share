<?php

namespace bigpaulie\social\share;

use bigpaulie\social\share\Widget;
use yii\helpers\Html;

class Share extends Widget {

    public function run() {
        echo Html::beginTag($this->tag , $this->htmlOptions);
        foreach ($this->networks as $key => $val) {
            echo $this->parseTemplate($key);
        }
        echo Html::endTag($this->tag);
    }

}
