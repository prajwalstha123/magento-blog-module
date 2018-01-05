<?php
namespace Gbd\Blog\Block;

use \Magento\Framework\View\Element\Template;
use \Magento\Framework\View\Element\Template\Context;
use \Magento\Framework\App\ObjectManager;
use \Gbd\Blog\Model\ResourceModel\Post\Collection as PostCollection;
use \Gbd\Blog\Model\ResourceModel\Post\CollectionFactory as PostCollectionFactory;
use \Gbd\Blog\Model\Post;

class Posts extends Template
{
    /**
     * CollectionFactory
     * @var null|CollectionFactory
     */
    protected $_postCollectionFactory = null;

    /**
     * Constructor
     *
     * @param Context $context
     * @param PostCollectionFactory $postCollectionFactory
     * @param array $data
     */
    public function __construct(Template\Context $context, PostCollectionFactory $postCollectionFactory, array $data = [])
    {
        $this->_postCollectionFactory = $postCollectionFactory;
        parent::__construct($context, $data);
    }

    /**
     * @return Post[]
     */
    public function getPosts()
    {
        $postCollection = $this->_postCollectionFactory->create();
        $postCollection->addFieldToSelect('*')->load();
        return $postCollection->getItems();
    }

    /**
     * For a given post, returns its url
     * @param Post $post
     * @return string
     */
    public function getPostUrl(Post $post)
    {
        $objectManager = ObjectManager::getInstance();
        $storeManager = $objectManager->get('\Magento\Store\Model\StoreManagerInterface');
        $baseUrl = $storeManager->getStore()->getBaseUrl();
        return $baseUrl . 'blog/post/view/id/' . $post->getId();
    }
}

