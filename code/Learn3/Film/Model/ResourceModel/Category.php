<?php
namespace Learn3\Film\Model\ResourceModel;

/**
 * Class Category
 * @package Learn3\Film\Model\ResourceModel
 */

class Category extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb{

    protected function _construct()
    {
       $this->_init('zero_training_four_category', 'category_id');
    }
}
?>