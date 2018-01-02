<?php
namespace Gbd\Blog\Model\ResourceModel\Post;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'post_id';
    protected $_eventPrefix = 'gbd_blog_post_collection';
    protected $_eventObject = 'post_collection';
    /**
     * Remittance File Collection Constructor
     */
    protected function _construct()
    {
        $this->_init('Gbd\Blog\Model\Post', 'Gbd\Blog\Model\ResourceModel\Post');
    }
}