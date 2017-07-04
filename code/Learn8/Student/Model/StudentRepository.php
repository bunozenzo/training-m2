<?php
namespace Learn8\Student\Model;


use Learn8\Student\Api\StudentRepositoryInterface;
use Learn8\Student\Model\StudentFactory;


class StudentRepository implements StudentRepositoryInterface{

    protected $_studentFactory;
    function __construct(
        StudentFactory $studentFactory
    )
    {
        $this->_studentFactory=$studentFactory;
    }
    /**
     * Returns greeting message to user
     *
     * @api
     * @param Learn8\Student\Api\Data\StudentInterface
     * @return true or false
     */
    public function save(\Learn8\Student\Api\Data\StudentInterface $student)
    {
        // TODO: Implement save() method.
        $data=$this->_studentFactory->create();
        $data->setData('name',$student->getName());
        $data->setData('class',$student->getClass());
        $data->setUniversity('university',$student->getUniversity());
        if($data->save()){
            return true;
        }else{
            return false;
        }
    }
    /**
     * Returns greeting message to user
     *
     * @api
     * @return array
     */
    public function getList()
    {
        $data=$this->_studentFactory->create()->getCollection();
        $student=$data->getData();
        return $student;
        // TODO: Implement getList() method.
    }

    /**
     * Returns greeting message to user
     *
     * @api
     * @param integer $studentId.
     * @return string Greeting message with users name.
     */
    public function deleteById($studentId)
    {
        // TODO: Implement deleteById() method.
        $data=$this->_studentFactory->create()->load($studentId);
        if($data->delete()){
            return true;
        }else{
            return false;
        }
    }
    /**
     * Returns greeting message to user
     *
     * @api
     * @param Learn8\Student\Api\Data\StudentInterface
     * @return true or false
     */
    public function delete(\Learn8\Student\Api\Data\StudentInterface $student)
    {
        // TODO: Implement delete() method.
        return $this->deleteById($student->getId());
    }
    /**
     * Returns greeting message to user
     *
     * @api
     * @param string $name
     * @return string Greeting message with users name.
     */
    public function name() {
      return"hello";
    }
}

?>