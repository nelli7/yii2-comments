<?php
/**
 * User.php
 * @author Revin Roman
 * @link https://nelli7.ru
 */

namespace nelli7\yii\module\Comments\tests\unit\models;

use nelli7\yii\module\Comments\interfaces\CommentatorInterface;

/**
 * Class User
 * @package nelli7\yii\module\Comments\tests\unit\models
 */
class User extends \yii\base\Model implements CommentatorInterface
{

    /**
     * @return string|false
     */
    public function getCommentatorAvatar()
    {
        return 'https://avatar';
    }

    /**
     * @return string
     */
    public function getCommentatorName()
    {
        return 'User name';
    }

    /**
     * @return string|false
     */
    public function getCommentatorUrl()
    {
        return 'https://user';
    }
}