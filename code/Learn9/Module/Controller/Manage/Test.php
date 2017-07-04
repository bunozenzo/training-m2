<?php
namespace Learn9\Module\Controller\Manage;


class Test extends \Magento\Framework\App\Action\Action{


    public function execute()
    {
        // TODO: Implement execute() method.
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}


?>