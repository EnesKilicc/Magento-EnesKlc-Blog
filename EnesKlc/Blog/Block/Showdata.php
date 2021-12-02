<?php

namespace EnesKlc\Blog\Block;

use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;
use EnesKlc\Blog\Model\ResourceModel\Post\CollectionFactory;

class Showdata extends Template
{

    public $collection;

    public function __construct(Context $context, CollectionFactory $collectionFactory, array $data = [])
    {
        $this->collection = $collectionFactory;
        parent::__construct($context, $data);
    }

    public function getCollection()
    {
        return $this->collection->create();
    }

}