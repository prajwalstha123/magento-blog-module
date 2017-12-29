<?php

namespace Gbd\Blog\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Gbd\Blog\Model\Post;

class Index extends \Magento\Backend\App\Action
{
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }

}