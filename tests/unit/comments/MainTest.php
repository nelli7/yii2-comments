<?php
/**
 * MainTest.php
 * @author Revin Roman
 * @link https://nelli7.ru
 */

namespace nelli7\yii\module\Comments\tests\unit\comments;

use nelli7\yii\module\Comments;

/**
 * Class MainTest
 * @package nelli7\yii\fontawesome\tests\unit\fontawesome
 */
class MainTest extends Comments\tests\unit\TestCase
{

    public function testMain()
    {
        /** @var Comments\Module $Module */
        $Module = \Yii::$app->getModule('comments');

        $this->assertInstanceOf('nelli7\yii\module\Comments\Module', $Module);
        $this->assertEquals('nelli7\yii\module\Comments\tests\unit\models\User', $Module->userIdentityClass);
    }
}