<?php
namespace Learn8\Student\Api\Data;



interface StudentInterface
{

    const ID = 'id';
    const NAME = 'name';
    const STUDENT_CLASS = 'class';
    const UNIVERSITY = 'university';

    /**
     * Get ID
     * @return int|null
     */
    public function getId();

    /**
     * Set ID.
     *
     * @param int $id
     *
     * @return \Learn8\Student\Api\Data\StudentInterface
     */
    public function setId($id);

    /**
     * Get Name
     * @return string|null
     */
    public function getName();
    /**
     * Set Name.
     *
     * @param string $name
     *
     * @return \Learn8\Student\Api\Data\StudentInterface
     */
    public function setName($name);

    /**
     * Get Class
     * @return string|null
     */
    public function getClass();

    /**
     * Set Class.
     *
     * @param string $class
     *
     * @return \Learn8\Student\Api\Data\StudentInterface
     */
    public function setClass($class);

    /**
     * Get University
     * @return string|null
     */
    public function getUniversity();

    /**
     * Set University
     * @param $university
     * @return \Learn8\Student\Api\Data\StudentInterface
     */
    public function setUniversity($university);



}


?>