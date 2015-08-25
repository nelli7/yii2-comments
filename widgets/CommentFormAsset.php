<?php
/**
 * CommentFormAsset.php
 * @author Revin Roman
 * @link https://nelli7.ru
 */

namespace nelli7\yii\module\Comments\widgets;

/**
 * Class CommentFormAsset
 * @package nelli7\yii\module\Comments\widgets
 */
class CommentFormAsset extends \yii\web\AssetBundle
{

    public $sourcePath = '@vendor/nelli7/yii2-comments/widgets/_assets';

    public $css = [
        'comment-form.css',
    ];
}