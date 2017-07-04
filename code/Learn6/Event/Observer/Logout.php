<?php

namespace Learn6\Event\Observer;

/**
 * Class Logout
 * @package Learn6\Event\Observer
 */
class Logout implements \Magento\Framework\Event\ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $customerSession = $objectManager->get('Magento\Customer\Model\Session');
        if ($customerSession->isLoggedIn()) {
            return $customerSession->logout();
        }
    }
}