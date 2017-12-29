<?php
namespace Gbd\Blog\Model\ResourceModel\Post;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Remittance File Collection Constructor
     */
    protected function _construct()
    {
        $this->_init('Gbd\Blog\Model\Post', 'Gbd\Blog\Model\ResourceModel\Post');
    }
}