<?php
/**
 * CommentatorInterface.php
 * @author Revin Roman
 * @link https://nelli7.ru
 */

namespace nelli7\yii\module\Comments\interfaces;

/**
 * Interface CommentatorInterface
 * @package nelli7\yii\module\Comments\interfaces
 */
interface CommentatorInterface
{

    /**
     * @return string|false
     */
    public function getCommentatorAvatar();

    /**
     * @return string
     */
    public function getCommentatorName();

    /**
     * @return string|false
     */
    public function getCommentatorUrl();
	
	 /**
     * @return string|false
     */

    public function getUserName($created_by);
	
}