<?php

namespace Gbd\Blog\Block\Adminhtml;
use \Magento\Backend\Block\Widget\Grid\Container;

class Post extends Container
{
    protected function _construct()
    {
        $this->_controller = 'adminhtml_post';
        $this->_blockGroup = 'Gbd_Blog';
        $this->_headerText = __('Posts');
        $this->_addButtonLabel = __('Create New Post');
        parent::_construct();
    }
}