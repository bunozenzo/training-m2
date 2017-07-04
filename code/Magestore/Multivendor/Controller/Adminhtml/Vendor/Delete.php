<?php
namespace Magestore\Multivendor\Controller\Adminhtml\Vendor;

class Delete extends \Magestore\Multivendor\Controller\Adminhtml\Vendor
{
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $vendorId = $this->getRequest()->getParam('id');
        if ($vendorId > 0) {
            $vendorModel = $this->_objectManager->create('Magestore\Multivendor\Model\Vendor')
                ->load($this->getRequest()->getParam('id'));
            try {
                $vendorModel->delete();
                $this->messageManager->addSuccess(__('Vendor was successfully deleted'));
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['_current' => true]);
            }
        }
        return $resultRedirect->setPath('*/*/');
    }
}
