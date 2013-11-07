YiiPlugin
=========

Wrapper classes required to run Yii functional tests with Codeception

For running tests you will need `CodeceptionHttpRequest` component from `web` directory, this component will be
 imported when you include Yii1 module. There is also an alias "codeceptionsrc" available in Yii that points to the  codeception source directory, you can use it as always:

 ```
 Yii::getPathOfAlias('codeceptionsrc');
 ```

 This component extends yii CHttpRequest and handles headers() and cookie correctly. Also you can
 modify it to be extended from your custom http-request component.
 
 You can test this module by creating new empty Yii application and creating this scenario:

``` php
<?php 
 $I = new TestGuy($scenario);
 $I->wantTo('Test index page');
 $I->amOnPage('/index.php');
 $I->see('My Web Application','#header #logo');
 $I->click('Login');
 $I->see('Login','h1');
 $I->see('Username');
 $I->fillField('#LoginForm_username','demo');
 $I->fillField('#LoginForm_password','demo');
 $I->click('#login-form input[type="submit"]');
 $I->seeLink('Logout (demo)');
 $I->click('Logout (demo)');
 $I->seeLink('Login');
```