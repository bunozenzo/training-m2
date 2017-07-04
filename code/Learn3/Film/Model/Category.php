<?php
namespace Learn3\Film\Model;

class Category extends \Magento\Framework\Model\AbstractModel{

    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Learn3\Film\Model\ResourceModel\Category $resource,
        \Learn3\Film\Model\ResourceModel\Category\Collection $Collection
    )
    {
        parent::__construct(
            $context,
            $registry,
            $resource,
            $Collection
        );
    }
}
?>