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

    function addCourse(array $data) {
        $this->executeStatement("INSERT INTO courses VALUES (:id, :name)", array(
            "name" => $data['name'],
            "id" => $data['id']
        ));
    }

    function updateCourse($id, array $data) {
        $this->executeStatement("UPDATE courses SET name = :name WHERE id = :id", array(
            "name" => $data['name'],
            "id" => $id
        ));
    }

    function deleteCourse($id) {
        $this->executeStatement("DELETE FROM courses WHERE id = :id", array("id" => $id));
    }
}
