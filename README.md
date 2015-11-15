Codeception <=> Yii Bridge
=========

Wrapper classes required to run Yii functional tests with Codeception.
Does not provide a smooth integration (yet). For now use for your own pain and risk.

### Concept

Yii1 framework was not designed for functional testing. This bridge classes include components that override standart Yii components to be testable. The most common issues with Yii functional tests are usage `headers`, `cookies` functions in PHP code, which produce errors on testing. Also usage of `exit` directive might even stop test execution completely.

### Install

* Install [Codeception](http://codeception.com/install) via composer
```
php composer.phar require "codeception/codeception:*"
php composer.phar update
```

* Bootstrap Codeception to ```protected/tests```

```
./vendor/bin/codecept bootstrap protected/tests
```

* And set up [Yii1](http://codeception.com/docs/modules/Yii1) module.

__test.php__:
```php
<?php

// Definitions
defined('DS') or define('DS', DIRECTORY_SEPARATOR);
defined('YII_DEBUG') or define('YII_DEBUG',true);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

// Load Yii and Composer extensions
require_once __DIR__.DS.'vendor'.DS.'yiisoft'.DS.'yii'.DS.'framework'.DS.'yii.php';
require_once __DIR__.DS.'vendor'.DS.'autoload.php';

// Load the config files
$config = require __DIR__.DS.'protected'.DS.'config'.DS.'test.php';

// Return for Codeception
return array(
    'class' => 'CWebApplication',
    'config' => $config,
);

```

__codeception.yml__:
```
actor: Dev
paths:
    tests: protected/tests
    log: protected/tests/_log
    data: protected/tests/_data
    helpers: protected/tests/_helpers
settings:
    bootstrap: _bootstrap.php
    colors: true
    memory_limit: 1024M
    log: true
    debug: true
modules:
    enabled: [PhpBrowser, WebHelper, TestHelper, Yii1]
    config:
        PhpBrowser:
            url: http://localhost:8234
        Yii1:
            appPath: test.php
            url: http://localhost:8234/test.php

```

* Install YiiBridge via Composer
```
php composer.phar require "codeception/YiiBridge:*"
php composer.phar update
```

* Modify your ```protected/config/test.php``` configuration file to use the ```CodeceptionHttpRequest``` class instead of ```CHttpRequest```

```php
<?php return array(
    [...]

    'components' => array(

        [...]

        'request' => array(
            'class' => 'CodeceptionHttpRequest'
        ),

        [...]
    ),
);
```

* Done! Use codeception normally to generate at run tests

### Important Notes

This bridge is far from complete. It might not suit your project as well. So any contributions are welcome. If you feel like you need to customize any of provided classes - please do that.

### Known Issues and Roadmap

* Sessions -> triggers php error
* Forwards -> triggers php error
* CLocale -> triggers error
* Http Codes
* WebApplication->end -> triggers `exit` directive

### Credits

Initial version created by [**Ragazzo**](https://github.com/Ragazzo).
