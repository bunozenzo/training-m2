<?php

namespace Learn3\Film\Controller\Ex;

use Magento\Framework\App\Action\Action;
use Learn3\Film\Model\FilmFactory;
use Learn3\Film\Model\ResourceModel\Film\CollectionFactory;
use Magento\Framework\App\Action\Context;

/**
 * Class Film
 * @package Learn3\Film\Controller\Ex
 */
class Film extends Action
{
    /**
     * @var FilmFactory
     * @var CollectionFactory
     */
    protected $filmFactory;
    protected $_collectionFactory;

    /**
     * Film constructor.
     * @param Context $context
     * @param FilmFactory $filmFactory
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        Context $context,
        FilmFactory $filmFactory,
        CollectionFactory $collectionFactory
    )
    {
        parent::__construct($context);
        $this->filmFactory = $filmFactory;
        $this->_collectionFactory = $collectionFactory;
    }

    public function execute()
    {
        /**
         * khoi tao mot objectManager
         */
//        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();

        /**
         * Cach 1 su dung objectManager collection la du lieu nhieu ban ghi cung thuoc tinh
         */
        $vendorModel = $this->_objectManager
            ->create('Learn3\Film\Model\ResourceModel\Film\Collection');
        \Zend_Debug::dump($vendorModel->getData());
        /**
         * Cach 2 su dung objectManager lay du lieu 1 ban ghi
         */
//        $vendorModel = $this->_objectManager
//            ->create('Learn3\Film\Model\Film')->load(1);
//        \Zend_Debug::dump($vendorModel->getData());

        /**
         * Cach 3 su dung Factory lay du lieu 1 ban ghi
         */

//        $data=$this->filmFactory->create()->load(1);
//        \Zend_Debug::dump($data->getData());

        /**
         * Cach 4 su dung FactoryColection lay du lieu nhieu ban ghi
         */

//        $data = $this->_collectionFactory->create();
//        \Zend_Debug::dump($data->getData());


//        $data=$this->filmFactory->create();
//        \Zend_Debug::dump($data->getNumActor());
    }
}

?>