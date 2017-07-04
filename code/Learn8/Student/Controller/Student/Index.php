<?php
namespace Learn8\Student\Controller\Student;

use Learn8\Student\Model\StudentFactory;
use Magento\Framework\App\Action\Context;

class Index extends \Magento\Framework\App\Action\Action{

    protected $_studentFactory;

    public function __construct(
        Context $context,
        StudentFactory $studentFactory
    )
    {
        parent::__construct($context);
        $this->_studentFactory=$studentFactory;
    }

    public function execute()
    {
        // TODO: Implement execute() method.
       $data=$this->_studentFactory->create()->getCollection();
       \Zend_Debug::dump($data->getData());

    }
}


?>