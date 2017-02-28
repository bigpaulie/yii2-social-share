<?php

namespace bigpaulie\social\share;

use yii\helpers\Url;
use \yii\web\View;
use bigpaulie\social\share\ShareAsset;

/**
 * Class Widget
 * @package bigpaulie\social\share
 */
class Widget extends \yii\base\Widget {

    /**
     * Widget type with small buttons
     * @var string
     */
    const TYPE_SMALL = 'small';

    /**
     * Widget type with large buttons
     * @var string
     */
    const TYPE_LARGE = 'large';

    /**
     * URL to be shared
     * @var string
     */
    public $url;

    /**
     * Enclosing HTML tag
     * @var string
     */
    public $tag = 'ul';

    /**
     * Label on the button
     * @var string
     */
    public $text = 'Share on {network}';

    /**
     * Widget type
     * @var string
     */
    public $type = self::TYPE_SMALL;

    /**
     * The button's HTML template
     * @var string
     */
    public $template = '<li>{button}</li>';

    /**
     * HTML attributes of the widget container
     * @var array
     */
    public $htmlOptions = [];

    /**
     * Supported social networks
     * @var array
     */
    protected $networks = [
        'facebook' => 'https://www.facebook.com/sharer/sharer.php?u={url}',
        'google-plus' => 'https://plus.google.com/share?url={url}',
        'twitter' => 'https://twitter.com/home?status={url}',
        'linkedin' => 'https://www.linkedin.com/shareArticle?mini=true&url={url}',
        'vk' =>  'http://vkontakte.ru/share.php?url={url}',
        'odnoklassniki' => 'http://www.odnoklassniki.ru/dk?st.cmd=addShare&st.s=1&st._surl={url}',
    ];

    /**
     * Exclude network form widget
     * any key present in this array will be excluded form
     * the widget.
     *
     * @var array
     */
    public $exclude = [];

    /**
     * Initialize the widget
     */
    public function init() {

        /**
         * if no id is specified by the user
         * assign a generated one
         */
        if(!isset($this->htmlOptions['id'])){
            $this->htmlOptions['id'] = ($this->id)? $this->id : $this->getId();
        }

        /**
         * if no URL is specified by the user
         * than we assign the default route URL
         */
        if (!$this->url) {
            $this->url = Url::to('', TRUE);
        }

        /**
         * Register this asset with a View
         */
        ShareAsset::register($this->getView());
    }

    /**
     * Parse the template and create the
     * specific button for the selected network
     *
     * @param string $network
     * @return mixed
     */
    protected function parseTemplate($network) {

        if ( !in_array($network, $this->exclude) ) {
            switch ($this->type) {
                case self::TYPE_SMALL:
                    $url = $this->networks[$network];
                    $button = str_replace('{button}',
                        '<a href="#" class="btn btn-social-icon btn-{network}" onClick="sharePopup(\'' . $url . '\');">'
                        . '<i class="fa fa-{network}"></i></a>', $this->template);
                    $button = str_replace('{network}', $network, $button);
                    $button = str_replace('{url}', $this->url, $button);
                    return $button;
                case self::TYPE_LARGE:
                    $url = $this->networks[$network];
                    $button = str_replace('{button}',
                        '<a href="#" class="btn btn-block btn-social btn-{network}" onClick="sharePopup(\'' . $url . '\');">'
                        . '<i class="fa fa-{network}"></i> {text}</a>', $this->template);
                    $button = str_replace('{text}', $this->text, $button);
                    $button = str_replace('{network}', $network, $button);
                    $button = str_replace('{url}', $this->url, $button);
                    return $button;
                default:
                    break;
            }
        }
    }

    /**
     * Set networks array
     * @param array $networks
     * @return Widget
     */
    public function setNetworks($networks)
    {
        $this->networks = $networks;
        return $this;
    }

    /**
     * Get the networks array
     * @return array
     */
    public function getNetworks()
    {
        return $this->networks;
    }

}