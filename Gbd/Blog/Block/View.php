<?php

namespace Gbd\Blog\Block;

use \Magento\Framework\Exception\LocalizedException;
use \Magento\Framework\View\Element\Template;
use \Magento\Framework\View\Element\Template\Context;
use \Magento\Framework\Registry;
use \Gbd\Blog\Model\Post;
use \Gbd\Blog\Model\PostFactory;
use \Gbd\Blog\Controller\Post\View as ViewAction;

class View extends Template
{
    /**
     * Core registry
     * @var Registry
     */
    protected $_coreRegistry;

    /**
     * Post
     * @var null|Post
     */
    protected $_post = null;

    /**
     * PostFactory
     * @var null|PostFactory
     */
    protected $_postFactory = null;

    /**
     * Constructor
     * @param Context $context
     * @param Registry $coreRegistry
     * @param PostFactory $postFactory
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        PostFactory $postFactory,
        array $data = []
    ){
        $this->_postFactory = $postFactory;
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context, $data);

    }

    /**
     * Lazy loads the requested post
     * @return Post
     * @throws LocalizedException
     */
    public function getPost()
    {
        if ($this->_post === null )
        {
            $post = $this->_postFactory->create();
            $post->load($this->_getPostId());

            if( !$post->getId()){
                throw new LocalizedException( __('Post not Found' ) );
            }

            $this->_post = $post;
        }
        return $this->_post;
    }

    /**
     * Retrieves the post id from the registry
     * @return int
     */
    protected function _getPostId()
    {
        return (int) $this->_coreRegistry->registry(
            ViewAction::REGISTRY_KEY_POST_ID
        );
    }

}