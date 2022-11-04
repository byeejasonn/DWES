<?php

class StudentManager {

    private static $list = [];
    private static $instance;

    public static function singleton() {
        if(!isset(self::$instance)) {
            self::$instance = new StudentManager();
        }
        return self::$instance;
    }
    
    private function __construct() {
        fetchStudents();
    }

    public function fetchStudents() {
        self::$list = file_get_contents(
            "list.csv"
        );
    
        self::$list = explode("\n",$list);
        array_pop(self::$list);

        return self::$list;
    }

    protected function saveAlumnos(Student $student) {
        file_put_contents(
            "list.csv",
            getName($student).",".
            getSurname($student).",".
            getUser($student).",".
            getPassword($student).",".
            getMail($student).",".
            gettlf($student).",".
            getGender($student).",".
            getGrade($student).",".
            getBirthDate($student)."\n",
            FILE_APPEND
        );
    }    


}