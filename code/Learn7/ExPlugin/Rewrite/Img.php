<?php
/**
 * Copyright © 2013-2017 Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Checkout\CustomerData;

use Magento\Quote\Model\Quote\Item;

/**
 * Abstract item
 */
abstract class Img implements ItemInterface
{
    /**
     * @var Item
     */
    protected $item;

    /**
     * {@inheritdoc}
     */
    public function getItemData(Item $item)
    {
        $item['product_image']['src'] = 'https://www.magestore.com/magento-2-tutorial/wp-content/uploads/2016/10/Best_Retail_Solution.png';
        return $item;
    }

    /**
     * Get item data. Template method
     *
     * @return array
     */
    abstract protected function doGetItemData();
}
