Codeception <=> Yii Bridge
=========

Wrapper classes required to run Yii functional tests with Codeception.
Does not provide a smooth integration (yet). For now use for your own pain and risk.

### Concept

Yii1 framework was not designed for functional testing. This bridge classes include components that override standart Yii components to be testable. The most common issues with Yii functional tests are usage `headers`, `cookies` functions in PHP code, which produce errors on testing. Also usage of `exit` directive might even stop test execution completely. 

### Install

* Install [Codeception](http://codeception.com/install) and set up [Yii1](http://codeception.com/docs/modules/Yii1) module. 
* Clone this repository into `tests/_data` directory.

```
git clone git@github.com:Codeception/YiiBridge.git tests/_data/YiiBridge
```

* include `yiit.php` file in your `tests/_bootstrap.php`:

``` php
require_once __DIR__.'/../_data/YiiBridge/yiit.php';

```

* Done!

### Important Notes

This bridge is far from complete. It might not suit your project as well. So any contributions are welcome. If you feel like you need to customize any of provided classes - please do that. 

### Known Issues and Roadmap

* Sessions -> triggers php error
* Forwards -> triggers php error
* Http Codes
* WebApplication->end -> triggers `exit` directive

### Credits

Initial version created by [**Ragazzo**](https://github.com/Ragazzo).
