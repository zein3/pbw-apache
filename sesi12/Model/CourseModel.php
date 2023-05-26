<?php

class CourseModel extends Database
{
    function __construct()
    {
        $this->connect();
    }

    function listCourses()
    {
        return $this->select("SELECT * FROM courses", array());
    }

    function updateCourse($id, array $data) {
        $this->executeStatement("UPDATE courses SET name = :name WHERE id = :id", array(
            "name" => $data['name'],
            "id" => $data['id']
        ));
    }
}
