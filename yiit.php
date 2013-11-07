<?php
function launch_codeception_yii_bridge() {
    Yii::setPathOfAlias('codeception-yii',__DIR__);
    Yii::import('codeception-yii.test.CTestCase');
    Yii::import('codeception-yii.yii.web.CodeceptionHttpRequest');
    Yii::import('system.test.CDbTestCase');
    Yii::import('system.test.CWebTestCase');
}
