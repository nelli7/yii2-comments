<?php
/**
 * Module.php
 * @author Revin Roman
 * @link https://nelli7.ru
 */

namespace nelli7\yii\module\Comments;

/**
 * Class Module
 * @package nelli7\yii\module\Comments
 */
class Module extends \yii\base\Module
{

    const NAME = 'comments';

    /** @var string|null */
    public $userIdentityClass = null;

    /** @var bool */
    public $useRbac = true;

    public function init()
    {
        parent::init();

        if ($this->userIdentityClass === null) {
            $this->userIdentityClass = \Yii::$app->getUser()->identityClass;
        }
    }
}