<?php
namespace EnesKlc\Blog\Controller\Index;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
class Index extends \Magento\Framework\App\Action\Action
{
    protected $_postFactory;
	protected $resultPageFactory;
 
    public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\EnesKlc\Blog\Model\PostFactory $postFactory
		)
	{
		$this->_pageFactory = $pageFactory;
		$this->_postFactory = $postFactory;
		return parent::__construct($context);
	}
 
    public function execute()
    {
        $post = $this->_postFactory->create();
		$collection = $post->getCollection();
		foreach($collection as $item){
			echo "<pre>";
			print_r($item->getData());
			echo "</pre>";
		}
		exit();
		return $this->_pageFactory->create();
	
    }
}