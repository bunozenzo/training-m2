<?php

namespace Learn9\Module\Controller\Page;


class Index extends \Magento\Framework\App\Action\Action
{
    protected $resultJsonFactory;
    protected $collectionFactory;
    protected $productFactory;
    protected $_storeManager;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $collectionFactory,
        \Magento\Catalog\Model\ProductFactory $productFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager
    )
    {
        parent::__construct($context);
        $this->resultJsonFactory = $resultJsonFactory;
        $this->collectionFactory = $collectionFactory;
        $this->productFactory = $productFactory;
        $this->_storeManager=$storeManager;
    }

    public function execute()
    {
        $data = $this->collectionFactory->create();
        $product = $this->productFactory->create();
        $data->addFieldToFilter('type_id', 'simple');
        $data->addAttributeToSelect(['name','price']);
        $data->getSelect()->limit(2);
        $resArray = [];
        $i = 0;
        foreach ($data as $pro) {
            $proUrl = $this->_objectManager->get('Magento\Catalog\Helper\Product')->getProductUrl($pro);
//            $mediaUrl = $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
//            $listBlock = $this->_objectManager->get('\Magento\Catalog\Block\Product\ListProduct');
//            $addToCartUrl = $listBlock->getAddToCartUrl($pro);
//            $postData = $this->_objectManager->get('Magento\Framework\Data\Helper\PostHelper')->getPostData($addToCartUrl, ['product' => $pro->getId()]);
            $resArray[$i] = $pro->getData();
            $resArray[$i]['url'] = $proUrl;
//            $resArray[$i]['url_media'] = $mediaUrl;
//            $resArray[$i]['post_data'] = $postData;
            $i++;
        }
        $resultJson = $this->resultJsonFactory->create();
        return $resultJson->setData($resArray);
    }
}