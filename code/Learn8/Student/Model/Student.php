<?php
namespace Learn8\Student\Model;


class Student extends \Magento\Framework\Model\AbstractModel{

    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Learn8\Student\Model\ResourceModel\Student $resource = null,
        \Learn8\Student\Model\ResourceModel\Student\Collection $collection)
    {
        parent::__construct(
            $context,
            $registry,
            $resource,
            $collection
        );
    }
}
?>