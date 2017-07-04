<?php
namespace Learn9\Module\Block;



use Magento\Framework\View\Element\Template;

class Page extends Template{
    protected $_objectManager;
    protected $_storeManager;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\ObjectManagerInterface $objectManager,
        array $data
    )
    {
        $this->_objectManager = $objectManager;
        $this->_storeManager = $context->getStoreManager();
        parent::__construct($context, $data);
    }
    public function getAjaxUrl(){
        return $this->getUrl("learn9/page/index"); // Controller Url
    }
}

?>