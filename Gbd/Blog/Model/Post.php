<?php

namespace Gbd\Blog\Model;

use \Magento\Framework\Model\AbstractModel;
use \Magento\Framework\DataObject\IdentityInterface;
use \Gbd\Blog\Api\Data\PostInterface;

/**
 * Class File
 * @package Gbd\Blog\Model
 * @SupressWarnings(PHPMD.CouplingBetweenObjects)
 */

class Post extends AbstractModel implements PostInterface, IdentityInterface
{
    /**
     * Cache Tag
     */
    const CACHE_TAG = 'gbd_blog_post';

    protected function _construct()
    {
        $this->_init('Gbd\Blog\Model\ResourceModel\Post');
    }

    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    public function getContent()
    {
        return $this->getData(self::CONTENT);
    }

    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    public function getId()
    {
        return $this->getData(self::POST_ID);
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId() ];
    }

    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    public function setContent($content)
    {
        return $this->setData(self::CONTENT, $content);
    }

    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    public function setId($id)
    {
        return $this->setData(self::POST_ID, $id);
    }
}
