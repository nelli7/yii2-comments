<?php
/**
 * CommentListAsset.php
 * @author Revin Roman
 * @link https://nelli7.ru
 */

namespace nelli7\yii\module\Comments\widgets;

/**
 * Class CommentListAsset
 * @package nelli7\yii\module\Comments\widgets
 */
class CommentListAsset extends \yii\web\AssetBundle
{

    public $sourcePath = '@vendor/nelli7/yii2-comments/widgets/_assets';

    public $css = [
        'comment-list.css',
    ];

    public $js = [
        'comment-list.js',
    ];

    public $depends = [
        '\yii\web\YiiAsset',
        '\yii\web\JqueryAsset',
    ];
}