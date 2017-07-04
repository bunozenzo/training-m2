<?php
namespace Learn4\Product\Controller\Product;

use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Catalog\Model\ProductFactory;
use Magento\Framework\App\Action\Context;

/**
 * Class Getcollection
 * @package Learn4\Product\Controller\Product
 */

class Getcollection extends \Magento\Framework\App\Action\Action{

    protected $_collectionFactory;

    /**
     * Getcollection constructor.
     * @param Context $context
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        Context $context,
        CollectionFactory $collectionFactory
    )
    {
        parent::__construct($context);
        $this->_collectionFactory=$collectionFactory;
    }

    public function execute()
    {
        /**
         * Get name Product
         */
        $id=$this->getRequest()->getParam('number');
        $data=$this->_collectionFactory->create();
        $data->addAttributeToSelect(['name']);
        $data->getSelect()->limit($id);
        foreach ($data as $item){
            \Zend_Debug::dump($item->getName());
        }
    }
}

?>