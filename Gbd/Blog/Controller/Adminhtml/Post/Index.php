<?php

namespace Gbd\Blog\Controller\Adminhtml\Post;

use Magento\Backend\App\Action;
use Gbd\Blog\Model\Post;

class Index extends \Magento\Backend\App\Action
{
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ){
        parent::__construct();
        $this->resultPageFactory = $resultPageFactory;

    }
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend((__('Posts')));

        return $resultPage;
    }

}