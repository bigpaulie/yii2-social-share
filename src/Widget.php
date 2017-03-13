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
     * Title to be shared
     * @var string
     */
    public $title;

    /**
     * Description to be shared
     * @var string
     */
    public $description;

    /**
     * Image to be shared
     * @var string
     */
    public $image;

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
        'pinterest' => 'http://pinterest.com/pin/create/button/?url={url}&media={image}&description={description}',
        'linkedin' => 'https://www.linkedin.com/shareArticle?mini=true&url={url}',
        'vk' =>  'http://vkontakte.ru/share.php?url={url}',
        'odnoklassniki' => 'http://www.odnoklassniki.ru/dk?st.cmd=addShare&st.s=1&st._surl={url}',
    ];

    /**
     * Include network form widget
     * If not empty - only keys presented in this array will be included to
     * the widget.
     *
     * @var array
     */
    public $include = [];

    /**
     * Exclude network form widget
     * any key present in this array will be excluded from
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
    protected function parseTemplate($network)
    {
        $button = '';

        if (!in_array($network, $this->exclude)) {
            $url = $this->networks[$network];

            switch ($this->type) {
                case self::TYPE_SMALL:
                    $button = str_replace(
                        '{button}',
                        '<a href="#" class="btn btn-social-icon btn-{network}" onClick="sharePopup(\'' . $url . '\');">'
                        . '<i class="fa fa-{network}"></i></a>',
                        $this->template
                    );
                    break;
                case self::TYPE_LARGE:
                    $button = str_replace(
                        '{button}',
                        '<a href="#" class="btn btn-block btn-social btn-{network}" onClick="sharePopup(\'' . $url . '\');">'
                        . '<i class="fa fa-{network}"></i> {text}</a>',
                        $this->template
                    );
                    break;
                default:
                    break;
            }
        }

        if ($button) {
            $button = str_replace(
                [
                    '{text}', '{network}', '{url}',
                    '{title}', '{description}', '{image}'
                ],
                [
                    $this->text, $network, urlencode($this->url),
                    urlencode($this->title), urlencode($this->description), urlencode($this->image)
                ],
                $button
            );
        }

        return $button;
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