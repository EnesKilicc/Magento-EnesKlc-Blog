<?php
namespace EnesKlc\Blog\Model;
class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'enesklc_blog_post';

	protected $_cacheTag = 'enesklc_blog_post';

	protected $_eventPrefix = 'enesklc_blog_post';

	protected function _construct()
	{
		$this->_init('EnesKlc\Blog\Model\ResourceModel\Post');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}