<?php

namespace Learn7\ExPlugin\Plugin\Minicart;

class Image
{
    public function aroundGetItemData($subject, $proceed, $item)
    {
        $result = $proceed($item);
        $result['product_image']['src'] = 'https://www.magestore.com/magento-2-tutorial/wp-content/uploads/2016/10/Best_Retail_Solution.png';
        return $result;
    }
}