<?php
namespace Learn8\Student\Model;

use Learn8\Student\Api\Data\StudentInterface;
use Magento\Framework\Model\AbstractModel;

class Data extends AbstractModel implements StudentInterface{

    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry
    )
    {
        parent::__construct($context, $registry);
    }
    public function getId()
    {
        // TODO: Implement getId() method.
        return $this->getData(self::ID);
    }
    public function setId($id)
    {
        // TODO: Implement setId() method.
        return $this->setData(self::ID, $id);
    }
    public function getName()
    {
        // TODO: Implement getName() method.
        return $this->getData(self::NAME);
    }
    public function setName($name)
    {
        // TODO: Implement setName() method.
        return $this->setData(self::NAME,$name);
    }
    public function getClass()
    {
        // TODO: Implement getClass() method.
        return $this->getData(self::STUDENT_CLASS);
    }
    public function setClass($class)
    {
        // TODO: Implement setClass() method.
        return $this->setData(self::STUDENT_CLASS,$class);
    }
    public function getUniversity()
    {
        // TODO: Implement getUniversity() method.
        return $this->getData(self::UNIVERSITY);
    }
    public function setUniversity($university)
    {
        // TODO: Implement setUniversity() method.
        return $this->setData(self::UNIVERSITY,$university);
    }
}

?>