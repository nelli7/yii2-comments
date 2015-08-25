<?php
/**
 * ItsMyComment.php
 * @author Revin Roman
 * @link https://nelli7.ru
 */

namespace nelli7\yii\module\Comments\rbac;

/**
 * Class ItsMyComment
 * @package nelli7\yii\module\Comments\rbac
 */
class ItsMyComment extends \yii\rbac\Rule
{

    public $name = 'comments.its-my-comment';

    /**
     * @inheritdoc
     */
    public function execute($user, $item, $params)
    {
        return (int)$user === (int)$params['Comment']->created_by;
    }
}