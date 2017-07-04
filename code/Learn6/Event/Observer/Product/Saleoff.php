<?php
namespace Learn6\Event\Observer\Product;

use \Psr\Log\LoggerInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;


class Saleoff implements ObserverInterface
{
    protected $_productRepository;
    protected $_cart;
    protected $formKey;

    public function __construct(\Magento\Catalog\Model\ProductRepository $productRepository, \Magento\Checkout\Model\Cart $cart, \Magento\Framework\Data\Form\FormKey $formKey){
        $this->_productRepository = $productRepository;
        $this->_cart = $cart;
        $this->formKey = $formKey;
    }
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $product = $observer->getEvent()->getData('product');
        $item = $observer->getEvent()->getData('quote_item');
        $item = ( $item->getParentItem() ? $item->getParentItem() : $item );
        $price = floatval($product['price'])/2;
        $item->setCustomPrice($price);
        $item->setOriginalCustomPrice($price);
        $item->getProduct()->setIsSuperMode(true);

    }

}
