<?php
namespace EnesKlc\Blog\Model\ResourceModel\Post;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'post_id';
	protected $_eventPrefix = 'enesklc_blog_post_collection';
	protected $_eventObject = 'post_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('EnesKlc\Blog\Model\Post', 'EnesKlc\Blog\Model\ResourceModel\Post');
	}

}
