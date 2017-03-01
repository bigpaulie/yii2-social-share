# yii2-social-share
[![Latest Stable Version](https://poser.pugx.org/bigpaulie/yii2-social-share/v/stable)](https://packagist.org/packages/bigpaulie/yii2-social-share) [![Total Downloads](https://poser.pugx.org/bigpaulie/yii2-social-share/downloads)](https://packagist.org/packages/bigpaulie/yii2-social-share) [![Latest Unstable Version](https://poser.pugx.org/bigpaulie/yii2-social-share/v/unstable)](https://packagist.org/packages/bigpaulie/yii2-social-share) [![License](https://poser.pugx.org/bigpaulie/yii2-social-share/license)](https://packagist.org/packages/bigpaulie/yii2-social-share)

Yii2 Social Link Sharer 

Built using <a href="http://lipis.github.io/bootstrap-social/" target="_blank">Bootstrap Social</a> and <a href="http://fontawesome.io/" target="_blank">Font Awesome</a> , two very cool projects !
Please keep in mind that this is a work in progress. 

## Install
The preferred way of installing is through composer
```
    composer require --prefer-dist bigpaulie/yii2-social-share "dev-master"
```

OR add to composer.json
```
    "bigpaulie/yii2-social-share": "dev-master"
```

## Example usage :
```php 
    use bigpaulie\social\share\Share;
```
By default you can run the widget with no configuration parameters

```php
    echo Share::widget();
```

this will produce an unordered list "ul" tag like
```HTML
    <ul>
        <li><a>....</a></li>
        <li><a>....</a></li>
        <li><a>....</a></li>
    </ul>
```

#### Changing the layout of the widget
```php
    echo Share::widget([
        'type' => 'small',
        'tag' => 'div',
        'template' => '<div>{button}</div>',
    ]);
```
The output of this will be something similar to :
```HTML
    <div>
        <div><a> .... </a></div>
        <div><a> .... </a></div>
        <div><a> .... </a></div>
    </div>
```

#### The shared URL
By default the widget set's the URL to the current route, you can change that as needed by 
using the "url" property.

```php
    echo Share::widget([
        'url' => 'http://www.domain.com',
    ]);
```

Or

```php
    echo Share::widget([
        'url' => Url::to(['site/index'] , TRUE),
    ]);
```
Don't forget to require the helper library Url and to use the second parameter of the method
for the full URL to the page.
```php
    use yii\helpers\Url;
```

#### The shared data
By default the widget pass to social network only URL.
Some networks, for example Pinterest, allow pass title, description and image.
You can change that as needed by 
using the "title", "description" or "image" properties.

```php
    echo Share::widget([
        'title' => 'Some title',
        'description' => 'Some description',
        'image' => '/path-to-some-image.jpg',
    ]);
```

#### Attributes of main container
You can add or change attributes of the main container using the htmlOptions property.
By default the main container has an id attribute similar to #w0, you can change that if you want.
```php
    echo Share::widget([
        'htmlOptions' => [
            'id' => 'new-id',
            'class' => 'my-class',
        ],
    ]);
```

#### Widget button types 
The widget provides to types of buttons
    small (icon only)
    large (icon + text)
    
```php 
    echo Share::widget([
        'type' => Share::TYPE_SMALL
    ]);
```

```php 
    echo Share::widget([
        'type' => Share::TYPE_LARGE
    ]);
```
The default text for the large buttons is "Share on NETWORK", where NETWORK is the name of the 
social network ex : Facebook.
You can change the default text by using the "text" property of the widget.
```php
    echo Share::widget([
        'text' => 'Click to share on {network}',
    ]);
```

#### Networks
Currently the widget provides 6 buttons
    Facebook
    Google Plus
    Twitter
    Pinterest
    Linkedin
    Vk
    odnoklassniki
    
    
#### Including only some networks
For some reason you may need to include only some networks.
In order to do that you can use the "include" property of the widget
```php
    echo Share::widget([
        'include' => ['network1', 'network2']
    ]);
```

Presented social networks will be shown in that order in which you put them.

#### Excluding some networks
For some reason you may need to exclude one or more networks.
In order to do that you can use the "exclude" property of the widget
```php
    echo Share::widget([
        'exclude' => ['network1', 'network2']
    ]);
```

### Contributions
Contributions are most welcomed, just fork modify and submit a pull request.