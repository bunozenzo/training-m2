<?php
namespace Learn8\Student\Controller\Student;

use Magento\Framework\App\Action\Action;
use Learn8\Student\Api\Data\StudentInterface;
use Learn8\Student\Api\StudentRepositoryInterface;
use Magento\Framework\App\Action\Context;

class Show extends Action{

    protected $_studentInterface;
    protected $_studentRepository;


    public function __construct(
        Context $context,
        StudentRepositoryInterface $studentRepository,
        StudentInterface $studentInterface
    )
    {
        parent::__construct($context);
        $this->_studentRepository=$studentRepository;
        $this->_studentInterface=$studentInterface;
    }

    public function execute()
    {
        // TODO: Implement execute() method.
        var_dump($this->_studentRepository->getList());

//        $student=$this->_studentInterface->setName('nam');
//        $student=$this->_studentInterface->setClass('123');
//        $student=$this->_studentInterface->setUniversity('utc');
//        if($this->_studentRepository->save($student)){
//            echo "thanh cong";
//        }else{
//            echo "that bai";
//        }
    }
}

?>