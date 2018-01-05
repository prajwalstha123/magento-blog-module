<?php

namespace Gbd\Blog\Controller\Index;

use \Magento\Framework\App\Action\Action;
use \Magento\Framework\View\Result\PageFactory;
use \Magento\Framework\View\Result\Page;
use \Magento\Framework\App\Action\Context;
use \Magento\Framework\Exception\LocalizedException;

class Index extends Action
{
    /*
     * @var PageFactory
     */
    protected $resultPageFactory;
    /*
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @codeCoverageIgnore
     * @SuppressWarnings(PHMD>ExcessiveParameterList)
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Prints the blog from informed order id
     * @return Page
     */
    public function execute()
    {
       $resultPage = $this->resultPageFactory->create();
       return $resultPage;
    }
}

