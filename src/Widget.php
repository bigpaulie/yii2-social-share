<?php

namespace bigpaulie\social\share;

use yii\helpers\Url;
use \yii\web\View;
use bigpaulie\social\share\ShareAsset;

class Widget extends \yii\base\Widget {

    public $url;
    public $tag = 'ul';
    public $text = 'Share on {network}';
    public $type = 'small';
    public $template = '<li>{button}</li>';
    public $htmlOptions = [];
    protected $networks = [
        'facebook' => 'https://www.facebook.com/sharer/sharer.php?u={url}',
        'google-plus' => 'https://plus.google.com/share?url={url}',
        'twitter' => 'https://twitter.com/home?status={url}',
        'linkedin' => 'https://www.linkedin.com/shareArticle?mini=true&url={url}',
        'vk' =>  'http://vkontakte.ru/share.php?url={url}',
        'odnoklassniki' => 'http://www.odnoklassniki.ru/dk?st.cmd=addShare&st.s=1&st._surl={url}',
    ];
    public $missButton = array();

    public function init() {

        if (!$this->id) {
            $this->id = $this->getId();
        }
        
        if(!isset($this->htmlOptions['id'])){
            $this->htmlOptions['id'] = $this->id;
        }

        if (!$this->url) {
            $this->url = Url::to('', TRUE);
        }

        $view = $this->getView();

        ShareAsset::register($view);
    }

    protected function parseTemplate($network) {
        if (in_array($network,$this->missButton)) {
            return false;
        }
        if ($this->type == 'small') {
            $url = $this->networks[$network];
            $button = str_replace('{button}', '<a href="#" class="btn btn-social-icon btn-{network}" onClick="sharePopup(\'' . $url . '\');">'
                    . '<i class="fa fa-{network}"></i></a>', $this->template);
            $button = str_replace('{network}', $network, $button);
            $button = str_replace('{url}', $this->url, $button);
            return $button;
        } elseif ($this->type == 'large') {
            $url = $this->networks[$network];
            $button = str_replace('{button}', '<a href="#" class="btn btn-block btn-social btn-{network}" onClick="sharePopup(\'' . $url . '\');">'
                    . '<i class="fa fa-{network}"></i> {text}</a>', $this->template);
            $button = str_replace('{text}', $this->text, $button);
            $button = str_replace('{network}', $network, $button);
            $button = str_replace('{url}', $this->url, $button);
            return $button;
        }
    }

}
