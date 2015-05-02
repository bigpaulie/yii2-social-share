# yii2-social-share
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
The default text for the large buttons is "Share on NETWORK", where NETWORK is the name of the 
social network ex : Facebook.
You can change the default text by using the "text" property of the widget.
```php
    echo Share::widget([
        'text' => 'Click to share on {network}',
    ]);
```

#### Networks
Currently the widget provides 4 buttons
    Facebook
    Google Plus
    Twitter
    Linkedin
