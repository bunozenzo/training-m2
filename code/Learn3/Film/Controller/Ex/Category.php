<?php
namespace Learn3\Film\Controller\Ex;

use Learn3\Film\Model\CategoryFactory;
use Magento\Framework\App\Action\Context;

/**
 * Class Category
 * @package Learn3\Film\Controller\Ex
 */
class Category extends \Magento\Framework\App\Action\Action{

    protected $_categoryFactory;

    public function __construct(
        Context $context,
        CategoryFactory $categoryFactory
    )
    {
        parent::__construct($context);
        $this->_categoryFactory=$categoryFactory;
    }
    public function execute()
    {
        $data=$this->_categoryFactory->create()->getCollection();
        \Zend_Debug::dump($data->getData());
//        $vendorModel = $this->_objectManager
//            ->create('Learn3\Film\Model\ResourceModel\Category\Collection');
//        \Zend_Debug::dump($vendorModel->getData());
//        $vendorModel = $this->_objectManager
//            ->create('Learn3\Film\Model\Category')->load(1);
//        \Zend_Debug::dump($vendorModel->getData());

    }
}
?>