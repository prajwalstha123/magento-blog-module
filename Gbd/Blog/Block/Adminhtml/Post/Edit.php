<?php

namespace Gbd\Blog\Block\Adminhtml\Post;

/**
 * Class Edit
 * @package Gbd\Blog\Block\Adminhtml\Post
 */
class Edit extends \Magento\Backend\Block\Widget\Form\Container
{
	/**
	 * Core registry
	 *
	 * @var \Magento\Framework\Registry
	 */
	public $coreRegistry;

	/**
	 * constructor
	 *
	 * @param \Magento\Framework\Registry $coreRegistry
	 * @param \Magento\Backend\Block\Widget\Context $context
	 * @param array $data
	 */
	public function __construct(
		\Magento\Framework\Registry $coreRegistry,
		\Magento\Backend\Block\Widget\Context $context,
		array $data = []
	)
	{
		$this->coreRegistry = $coreRegistry;
		parent::__construct($context, $data);
	}

	/**
	 * Initialize Post edit block
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_blockGroup = 'Gbd_Blog';
		$this->_controller = 'adminhtml_post';

		parent::_construct();

		$this->buttonList->add(
			'save-and-continue',
			[
				'label'          => __('Save and Continue Edit'),
				'class'          => 'save',
				'data_attribute' => [
					'mage-init' => [
						'button' => [
							'event'  => 'saveAndContinueEdit',
							'target' => '#edit_form'
						]
					]
				]
			],
			-100
		);
	}

	/**
	 * Retrieve text for header element depending on loaded Post
	 *
	 * @return string
	 */
	public function getHeaderText()
	{
		/** @var \Gbd\Blog\Model\Post $post */
		$post = $this->coreRegistry->registry('gbd_blog_post');
		if ($post->getId()) {
			return __("Edit Post '%1'", $this->escapeHtml($post->getName()));
		}

		return __('New Post');
	}
}