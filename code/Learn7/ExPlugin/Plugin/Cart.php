<?php
namespace Learn7\ExPlugin\Plugin;

/**
 * Class Cart
 * @package Learn7\ExPlugin\Plugin
 */
class Cart
{
    protected $_responseFactory;
    protected $_url;

    public function __construct(\Magento\Framework\App\ResponseFactory $responseFactory,
                                \Magento\Framework\UrlInterface $url)
    {
        $this->_responseFactory = $responseFactory;
        $this->_url = $url;
    }
    public function  afterExecute($subject,$result)
    {
        $cartUrl = $this->_url->getUrl('checkout/cart/index');
        $this->_responseFactory->create()->setRedirect($cartUrl)->sendResponse();
        exit;
    }
}
?>