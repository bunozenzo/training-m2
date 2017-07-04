<?php

namespace Inchoo\Hello\Controller\Index;
use Magento\Framework\App\Action\Context;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $data;
    public function __construct( \Magento\Framework\App\Action\Context $context,
                                 \Inchoo\Hello\Api\HelloInterface $data
    )
    {
        parent::__construct($context);
        $this->data=$data;
    }

    public function execute()
    {
        echo $this->data->name('jont');
        echo "hello";
        exit;
    }
}
