<?php
namespace Learn3\Film\Model\ResourceModel;
/**
 * Class Film
 * @package Learn3\Film\Model\ResourceModel
 */

class Film extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb{

    /**
     *
     */
    protected function _construct()
    {
        $this->_init('zero_training_four_film','film_id');
    }
}
?>