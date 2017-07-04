<?php
namespace Learn7\ExPlugin\Plugin;


/**
 * Class Img
 * @package Learn7\ExPlugin\Plugin
 */
class Img
{
    public function afterGetImage($item, $result)
    {
        $result->setImageUrl( 'https://www.magestore.com/magento-2-tutorial/wp-content/uploads/2016/10/Best_Retail_Solution.png' );
        return $result;
    }
}