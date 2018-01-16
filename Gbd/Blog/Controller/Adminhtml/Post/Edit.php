<?php

namespace Gbd\Blog\Controller\Adminhtml\Post;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Gbd\Blog\Controller\Adminhtml\Post;
use Gbd\Blog\Model\PostFactory;

/**
 * Class Edit
 * @package Mageplaza\Blog\Controller\Adminhtml\Post
 */
class Edit extends Post
{
	/**
	 * Page factory
	 *
	 * @var \Magento\Framework\View\Result\PageFactory
	 */
	public $resultPageFactory;

	/**
	 * Edit constructor.
	 * @param \Magento\Backend\App\Action\Context $context
	 * @param \Magento\Framework\Registry $registry
	 * @param \Gbd\Blog\Model\PostFactory $postFactory
	 * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
	 */
	public function __construct(
		Context $context,
		Registry $registry,
		PostFactory $postFactory,
		PageFactory $resultPageFactory
	)
	{
		$this->resultPageFactory = $resultPageFactory;

		parent::__construct($postFactory, $registry, $context);
	}

	/**
	 * @return \Magento\Backend\Model\View\Result\Page|\Magento\Framework\Controller\Result\Redirect|\Magento\Framework\View\Result\Page
	 */
	public function execute()
	{
		/** @var \Gbd\Blog\Model\Post $post */
		$post = $this->initPost();
		if (!$post) {
			$resultRedirect = $this->resultRedirectFactory->create();
			$resultRedirect->setPath('*');

			return $resultRedirect;
		}

		$data = $this->_session->getData('gbd_blog_post_data', true);
		if (!empty($data)) {
			$post->setData($data);
		}

		$this->coreRegistry->register('gbd_blog_post', $post);
		/** @var \Magento\Backend\Model\View\Result\Page|\Magento\Framework\View\Result\Page $resultPage */
		$resultPage = $this->resultPageFactory->create();
		$resultPage->setActiveMenu('Gbd_Blog::post');
		$resultPage->getConfig()->getTitle()->set(__('Posts'));

		$title = $post->getId() ? $post->getName() : __('New Post');
		$resultPage->getConfig()->getTitle()->prepend($title);

		return $resultPage;
	}
}