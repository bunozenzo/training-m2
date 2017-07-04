<?php

namespace Learn4\Product\Controller\Product;

use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Framework\App\Action\Context;

/**
 * Class Add
 * @package Learn4\Product\Controller\Product
 */
class Add extends \Magento\Framework\App\Action\Action
{

    protected $_collectionFactory;
    protected $_cart;

    /**
     * Add constructor.
     * @param Context $context
     * @param CollectionFactory $collectionFactory
     * @param \Magento\Checkout\Model\Cart $cart
     */
    public function __construct(
        Context $context,
        CollectionFactory $collectionFactory,
        \Magento\Checkout\Model\Cart $cart
    )
    {
        parent::__construct($context);
        $this->_collectionFactory = $collectionFactory;
        $this->_cart = $cart;
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('number');
        $data = $this->_collectionFactory->create();
        $data->addFieldToFilter('type_id','simple');
        $data->getSelect()->limit($id, 2);
        foreach ($data as $item) {
            try {
                $this->_cart->addProduct($item, ['qty' => '1']);
                $this->_cart->save();
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addException(
                    $e,
                    __('%1', $e->getMessage())
                );
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('error.'));
            }

        }
    }
}

?>