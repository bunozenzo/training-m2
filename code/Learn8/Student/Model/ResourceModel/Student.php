<?php
namespace Learn8\Student\Model\ResourceModel;

class Student extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb{

    protected function _construct()
    {
        // TODO: Implement _construct() method.
        $this->_init('student','id');
    }
}

?>