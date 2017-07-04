<?php
namespace Learn9\Module\Controller\Manage;


/**
 * Class Contact
 * @package Learn9\Module\Controller\Manage
 */
class Contact extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}
