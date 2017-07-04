<?php
namespace Learn8\Student\Api;


interface StudentRepositoryInterface
{
    /**
     * @param Data\StudentInterface $student
     * @return \Learn8\Student\Api\Data\StudentInterface
     */
    public function save(\Learn8\Student\Api\Data\StudentInterface $student);

    /**
     * @return \Learn8\Student\Api\Data\StudentInterface
     */
    public function getList();

    /**
     * @param Data\StudentInterface $student
     * @return true|false
     */
    public function delete(\Learn8\Student\Api\Data\StudentInterface $student);

    /**
     * @param integer $studentId.
     * @return string Greeting message with users name.
     */
    public function deleteById($studentId);
    /**
     * Returns greeting message to user
     *
     * @api
     * @param string $name
     * @return string Greeting message with users name.
     */
    public function name();
}


?>