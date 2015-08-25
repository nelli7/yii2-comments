<?php
/**
 * CommentListWidget.php
 * @author Revin Roman
 * @link https://rmrevin.ru
 */

namespace rmrevin\yii\module\Comments\widgets;

use rmrevin\yii\module\Comments;

/**
 * Class CommentListWidget
 * @package rmrevin\yii\module\Comments\widgets
 */
class CommentListWidget extends \yii\base\Widget
{

    /** @var string|null */
    public $theme;

    /** @var array */
    public $viewParams = [];

    /** @var array */
    public $options = ['class' => 'comments-widget'];

    /** @var string */
    public $entity;
	
	/** @var int */
	
	public $created_by;

    /** @var string */
    public $anchorAfterUpdate = '#comment-%d';

    /** @var array */
    public $pagination = [
        'pageParam' => 'page',
        'pageSizeParam' => 'per-page',
        'pageSize' => 20,
        'pageSizeLimit' => [1, 50],
    ];

    /** @var array */
    public $sort = [
        'defaultOrder' => [
            'id' => SORT_ASC,
        ],
    ];

    /** @var bool */
    public $showDeleted = true;

    /** @var bool */
    public $showCreateForm = true;

    public function init()
    {
        parent::init();

        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        CommentListAsset::register($this->getView());

        $this->processDelete();

        $CommentsQuery = Comments\models\Comment::find()
            ->byEntity($this->entity);

        if (false === $this->showDeleted) {
            $CommentsQuery->withoutDeleted();
        }

        $CommentsDataProvider = new \yii\data\ActiveDataProvider([
            'query' => $CommentsQuery->with(['author', 'lastUpdateAuthor']),
            'pagination' => $this->pagination,
            'sort' => $this->sort,
        ]);

        $params = $this->viewParams;
        $params['CommentsDataProvider'] = $CommentsDataProvider;

        $content = $this->render('comment-list', $params);

        return \yii\helpers\Html::tag('div', $content, $this->options);
    }

    private function processDelete()
    {
        $delete = (int)\Yii::$app->getRequest()->get('delete-comment');
        if ($delete > 0) {
            /** @var Comments\models\Comment $Comment */
            $Comment = Comments\models\Comment::find()
                ->byId($delete)
                ->one();

            if ($Comment->isDeleted()) {
                return;
            }

            if (!($Comment instanceof Comments\models\Comment)) {
                throw new \yii\web\NotFoundHttpException(\Yii::t('app', 'Comment not found.'));
            }

            if (!$Comment->canDelete()) {
                throw new \yii\web\ForbiddenHttpException(\Yii::t('app', 'Access Denied.'));
            }

            $Comment->deleted = Comments\models\Comment::DELETED;
            $Comment->update();
        }
    }

    /**
     * @inheritdoc
     */
    public function getViewPath()
    {
        if (empty($this->theme)) {
            return parent::getViewPath();
        } else {
            return \Yii::$app->getViewPath() . DIRECTORY_SEPARATOR . $this->theme;
        }
    }
}