<?php
namespace Learn5\Faq\Block;

/**
 * Class ProInfo
 * @package Learn5\Faq\Block
 */
class ProInfo extends \Magento\Framework\View\Element\Template
{
    protected $registry;
    protected $_objectManager;
    protected $_storeManager;

    /**
     * ProInfo constructor.
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     * @param \Magento\Framework\Registry $registry
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\ObjectManagerInterface $objectManager,
        \Magento\Framework\Registry $registry,
        array $data
    )
    {
        $this->_objectManager = $objectManager;
        $this->_storeManager = $context->getStoreManager();
        $this->_registry = $registry;
        parent::__construct($context, $data);
    }

    public function getCategoryModel()
    {
        $id = $this->getRequest()->getParam('id');
        $product = $this->_objectManager->get('Magento\Catalog\Model\Product')->load($id);
        $categories = $product->getCategoryIds();
        foreach($categories as $category){
            $cat = $this->_objectManager->create('Magento\Catalog\Model\Category')->load($category);
            echo $cat->getName()."</br>";
        }
    }
}