<?php
/*
* Modal Class for the module
* @author Prajwal Shrestha
* @since version 0.1.2
* @see https://www.toptal.com/magento/magento-2-tutorial-building-a-complete-module
*/

namespace Gbd\Blog\Model\ResourceModel;

use \Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Post extends AbstractDb
{
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    )
    {
        parent::__construct($context);
    }
    /*
     * Post Abstract Resource Constructor
     * @return void
     */
    protected function _construct()
    {
        $this->_init('gbd_blog_post', 'post_id');

    }
}