<?php

require_once PROJECT_ROOT_PATH . "/Model/CourseModel.php";

class CourseController extends BaseController
{
    var $model;

    function __construct()
    {
        $this->model = new CourseModel();
    }

    function listGet($pathParams, $payload)
    {
        $courses = $this->model->listCourses();

        $this->sendOutput(
            json_encode($courses),
            array('Content-Type: application/json'),
            200
        );
    }

    function detailGet($pathParams, $payload)
    {
        $courses = $this->model->listCourses();
        // $courses = array(
        //     (object) array(
        //         "id" => 1,
        //         "name" => "Pemrograman Berbasis Web"
        //     ),
        //     (object) array(
        //         "id" => 2,
        //         "name" => "Pemrograman Android"
        //     )
        // );

        $courseId = $pathParams["id"];
        $filteredCourses = array_filter($courses, function ($c) use ($courseId) {
            return $c->id == $courseId;
        });

        if (count($filteredCourses) > 0) {
            $this->sendOutput(
                json_encode($filteredCourses[array_key_first($filteredCourses)]),
                array('Content-Type: application/json'),
                200
            );
        } else {
            $this->sendOutput(
                "Course having id " . $courseId . " is not found",
                array('Content-Type: application/json'),
                404
            );
        }
    }

    function addPost($pathParams, $payload)
    {
        $this->model->addCourse($payload);
        $courses = $this->model->listCourses();
        // $courses = array(
        //     (object) array(
        //         "id" => 1,
        //         "name" => "Pemrograman Berbasis Web"
        //     ),
        //     (object) array(
        //         "id" => 2,
        //         "name" => "Pemrograman Android"
        //     )
        // );

        // array_push($courses, $payload);

        $this->sendOutput(
            json_encode($courses),
            array('Content-Type: application/json'),
            200
        );
    }

    function updatePut($pathParams, $payload)
    {
        $this->model->updateCourse($pathParams["id"], $payload);
        $courses = $this->model->listCourses();

        // $courses = array(
        //     (object) array(
        //         "id" => 1,
        //         "name" => "Pemrograman Berbasis Web"
        //     ),
        //     (object) array(
        //         "id" => 2,
        //         "name" => "Pemrograman Android"
        //     )
        // );

        // $courseId = $pathParams["id"];

        // foreach ($courses as $course) {
        //     if ($course->id == $courseId) {
        //         foreach (array_keys($payload) as $key) {
        //             $course->{$key} = $payload[$key];
        //         }
        //     }
        // }

        $this->sendOutput(
            json_encode($courses),
            array('Content-Type: application/json'),
            200
        );
    }

    function deleteDelete($pathParams, $payload)
    {
        $this->model->deleteCourse($pathParams['id']);
        $courses = $this->model->listCourses();
        // $courses = array(
        //     (object) array(
        //         "id" => 1,
        //         "name" => "Pemrograman Berbasis Web"
        //     ),
        //     (object) array(
        //         "id" => 2,
        //         "name" => "Pemrograman Android"
        //     )
        // );

        // $courseId = $pathParams["id"];

        // foreach ($courses as $key => $course) {
        //     if ($course->id == $courseId) {
        //         array_splice($courses, $key, 1);
        //     }
        // }

        $this->sendOutput(
            json_encode($courses),
            array('Content-Type: application/json'),
            200
        );
    }
}
